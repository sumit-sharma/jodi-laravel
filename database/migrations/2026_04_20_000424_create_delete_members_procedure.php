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
        DB::unprepared("DROP PROCEDURE IF EXISTS deletedata;");
        DB::unprepared("
                CREATE PROCEDURE deletedata(IN p_rno INT)
                BEGIN
                    DECLARE v_msg VARCHAR(255) DEFAULT 'Delete failed';

                    /* Error handler */
                    DECLARE EXIT HANDLER FOR SQLEXCEPTION
                    BEGIN
                        ROLLBACK;
                        SIGNAL SQLSTATE '45000'
                            SET MESSAGE_TEXT = v_msg;
                    END;

                    START TRANSACTION;

                    /* CHILD TABLES FIRST */
                    DELETE FROM followup           WHERE rno = p_rno;
                    DELETE FROM meeting            WHERE rno = p_rno OR proposal = p_rno;
                    DELETE FROM feedback           WHERE rno = p_rno OR proposal = p_rno;
                    DELETE FROM sendmail           WHERE rno = p_rno OR proposal = p_rno;
                    DELETE FROM client_sl          WHERE rno = p_rno OR proposal = p_rno;
                    DELETE FROM interaction        WHERE rno = p_rno;
                    DELETE FROM profile_payment    WHERE rno = p_rno;
                    DELETE FROM profile_matches    WHERE rno = p_rno;
                    DELETE FROM profile_bs         WHERE rno = p_rno;
                    DELETE FROM profile_education  WHERE rno = p_rno;
                    DELETE FROM profile_organisation WHERE rno = p_rno;
                    DELETE FROM profile_details    WHERE rno = p_rno;
                    DELETE FROM profile_personal   WHERE rno = p_rno;

                    /* VIEW / DERIVED TABLE */
                    DELETE FROM viewprofile        WHERE rno = p_rno;

                    /* PARENT TABLE LAST */
                    DELETE FROM profile_bio        WHERE rno = p_rno;

                    COMMIT;
                END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS deletedata;");
    }
};
