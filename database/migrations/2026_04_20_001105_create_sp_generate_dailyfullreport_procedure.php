<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS sp_generate_dailyfullreport;");
        DB::unprepared("
                CREATE PROCEDURE sp_generate_dailyfullreport(
                    IN p_userid INT,
                    IN p_from DATE,
                    IN p_to DATE
                )
                BEGIN
                        /* -------------------------------
                    1. RESET USER DATA
                    -------------------------------- */
                    DELETE FROM dailyfullreport WHERE userid = p_userid;

                    /* TOTAL ROW */
                    INSERT INTO dailyfullreport (userid, empid, empname)
                    VALUES (p_userid, 1, 'ALL');

                    /* EMPLOYEE ROWS */
                    INSERT INTO dailyfullreport (userid, empid, empname)
                    SELECT p_userid, username, name
                    FROM users
                    WHERE status = 1;

                    /* -------------------------------
                    2. NEW DATA (nde)
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT empid, COUNT(*) total
                        FROM profile_bio
                        WHERE profiledate BETWEEN CONCAT(p_from,' 00:00:00')
                                            AND CONCAT(p_to,' 23:59:59')
                        GROUP BY empid
                    ) x ON x.empid = d.empid
                    SET d.nde = x.total
                    WHERE d.userid = p_userid;

                UPDATE dailyfullreport d
                JOIN (
                    SELECT IFNULL(SUM(val),0) total
                    FROM (
                        SELECT nde AS val
                        FROM dailyfullreport
                        WHERE userid=p_userid AND empid<>1
                    ) t
                ) x
                SET d.nde = x.total
                WHERE d.userid=p_userid AND d.empid=1;


                    /* -------------------------------
                    3. EDIT DATA (edata) – FIXED DEDUP
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT empid, COUNT(DISTINCT rno, dated) total
                        FROM (
                            SELECT rno, empid, dated FROM editdatalog
                            UNION ALL
                            SELECT rno, empid, dated FROM edu_log
                            UNION ALL
                            SELECT rno, empid, dated FROM org_log
                            UNION ALL
                            SELECT rno, empid, dated FROM match_log
                            UNION ALL
                            SELECT rno, empid, dated FROM bs_log
                        ) t
                        WHERE dated BETWEEN p_from AND p_to
                        GROUP BY empid
                    ) x ON x.empid = d.empid
                    SET d.edata = x.total
                    WHERE d.userid = p_userid;

                UPDATE dailyfullreport d
                JOIN (
                    SELECT IFNULL(SUM(val),0) total
                    FROM (
                        SELECT edata AS val
                        FROM dailyfullreport
                        WHERE userid=p_userid AND empid<>1
                    ) t
                ) x
                SET d.edata = x.total
                WHERE d.userid=p_userid AND d.empid=1;


                    /* -------------------------------
                    4. INTERACTION
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT empid, COUNT(DISTINCT rno, dated) total
                        FROM interaction
                        WHERE dated BETWEEN p_from AND p_to
                        GROUP BY empid
                    ) x ON x.empid = d.empid
                    SET d.interaction = x.total
                    WHERE d.userid = p_userid;

                UPDATE dailyfullreport d
                JOIN (
                    SELECT IFNULL(SUM(val),0) total
                    FROM (
                        SELECT interaction AS val
                        FROM dailyfullreport
                        WHERE userid=p_userid AND empid<>1
                    ) t
                ) x
                SET d.interaction = x.total
                WHERE d.userid=p_userid AND d.empid=1;

                    /* -------------------------------
                    5. CLIENT SL
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT slby empid, COUNT(DISTINCT rno, dated) total
                        FROM client_sl
                        WHERE dated BETWEEN p_from AND p_to
                        GROUP BY slby
                    ) x ON x.empid = d.empid
                    SET d.sl = x.total
                    WHERE d.userid = p_userid;

                    
                    UPDATE dailyfullreport d
                    JOIN (
                    SELECT IFNULL(SUM(val),0) total
                    FROM (
                        SELECT sl AS val
                        FROM dailyfullreport
                        WHERE userid=p_userid AND empid<>1
                    ) t
                ) x
                SET d.sl = x.total
                WHERE d.userid=p_userid AND d.empid=1;    
                    

                    /* -------------------------------
                    6. DISPATCH (ms)
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT empid, COUNT(DISTINCT rno, proposal, dated) total
                        FROM sendmail
                        WHERE dated BETWEEN p_from AND p_to
                        GROUP BY empid
                    ) x ON x.empid = d.empid
                    SET d.ms = x.total
                    WHERE d.userid = p_userid;

                UPDATE dailyfullreport d
                JOIN (
                    SELECT IFNULL(SUM(val),0) total
                    FROM (
                        SELECT ms AS val
                        FROM dailyfullreport
                        WHERE userid=p_userid AND empid<>1
                    ) t
                ) x
                SET d.ms = x.total
                WHERE d.userid=p_userid AND d.empid=1;



                    /* -------------------------------
                    7. FEEDBACK UPDATED (fu)
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT fdb_by empid, COUNT(DISTINCT rno, proposal, DATE(fdb_date)) total
                        FROM sendmail
                        WHERE status=1
                        AND feedback<>''
                        AND fdb_date BETWEEN CONCAT(p_from,' 00:00:00')
                                        AND CONCAT(p_to,' 23:59:59')
                        GROUP BY fdb_by
                    ) x ON x.empid = d.empid
                    SET d.fu = x.total
                    WHERE d.userid = p_userid;

                UPDATE dailyfullreport d
                JOIN (
                    SELECT IFNULL(SUM(val),0) total
                    FROM (
                        SELECT fu AS val
                        FROM dailyfullreport
                        WHERE userid=p_userid AND empid<>1
                    ) t
                ) x
                SET d.fu = x.total
                WHERE d.userid=p_userid AND d.empid=1;


                    /* -------------------------------
                    8. FRESH CALLS (fc)
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT empid, SUM(noofcalls) total
                        FROM freshcalls
                        WHERE dated BETWEEN p_from AND p_to
                        GROUP BY empid
                    ) x ON x.empid = d.empid
                    SET d.fc = x.total
                    WHERE d.userid = p_userid;


                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT IFNULL(SUM(val),0) total
                        FROM (
                            SELECT fc AS val
                            FROM dailyfullreport
                            WHERE userid=p_userid AND empid<>1
                        ) t
                    ) x
                    SET d.fc = x.total
                    WHERE d.userid=p_userid AND d.empid=1;
                    

                    /* -------------------------------
                    9. NR CALLS
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT empid, COUNT(*) total
                        FROM interaction
                        WHERE calltype=6
                        AND dated BETWEEN p_from AND p_to
                        GROUP BY empid
                    ) x ON x.empid = d.empid
                    SET d.nr = x.total
                    WHERE d.userid = p_userid;

                UPDATE dailyfullreport d
                JOIN (
                    SELECT IFNULL(SUM(val),0) total
                    FROM (
                        SELECT nr AS val
                        FROM dailyfullreport
                        WHERE userid=p_userid AND empid<>1
                    ) t
                ) x
                SET d.nr = x.total
                WHERE d.userid=p_userid AND d.empid=1;

                    /* -------------------------------
                    10. DAILY MOMENT
                    -------------------------------- */
                    UPDATE dailyfullreport d
                    JOIN (
                        SELECT empid, COUNT(*) total
                        FROM daily_moment
                        WHERE dated BETWEEN p_from AND p_to
                        GROUP BY empid
                    ) x ON x.empid = d.empid
                    SET d.dm = x.total
                    WHERE d.userid = p_userid;

                    UPDATE dailyfullreport d
                        JOIN (
                            SELECT IFNULL(SUM(val),0) total
                            FROM (
                                SELECT dm AS val
                                FROM dailyfullreport
                                WHERE userid=p_userid AND empid<>1
                            ) t
                        ) x
                        SET d.dm = x.total
                        WHERE d.userid=p_userid AND d.empid=1;

                END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS sp_generate_dailyfullreport;");
    }
};
