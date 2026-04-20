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
        DB::unprepared("DROP PROCEDURE IF EXISTS memberconvert;");
        DB::unprepared("
                CREATE PROCEDURE memberconvert(
                    IN p_old_rno INT,
                    IN p_new_rno INT,
                    IN p_empid INT
                )
                BEGIN
                    
                        DECLARE v_rows INT DEFAULT 0;
                    DECLARE v_msg  VARCHAR(255);

                    /* ERROR HANDLER */
                    DECLARE EXIT HANDLER FOR SQLEXCEPTION
                    BEGIN
                        ROLLBACK;

                        INSERT INTO convert_log
                        (
                            old_rno, new_rno, empid,
                            status, message,
                            dated, time,
                            created_at, updated_at
                        )
                        VALUES
                        (
                            p_old_rno, p_new_rno, p_empid,
                            'FAILED', v_msg,
                            CURDATE(), CURTIME(),
                            NOW(), NOW()
                        );

                        SIGNAL SQLSTATE '45000'
                            SET MESSAGE_TEXT = v_msg;
                    END;

                    /* VALIDATIONS */
                    IF p_old_rno = p_new_rno THEN
                        SET v_msg = 'Old RNO and New RNO cannot be the same';
                        SIGNAL SQLSTATE '45000';
                    END IF;

                    IF NOT EXISTS (SELECT 1 FROM profile_bio WHERE rno = p_old_rno) THEN
                        SET v_msg = 'Old RNO does not exist';
                        SIGNAL SQLSTATE '45000';
                    END IF;

                    IF EXISTS (SELECT 1 FROM profile_bio WHERE rno = p_new_rno) THEN
                        SET v_msg = 'New RNO already exists';
                        SIGNAL SQLSTATE '45000';
                    END IF;

                    START TRANSACTION;

                    /* CORE UPDATE */
                    UPDATE profile_bio
                        SET rno = p_new_rno, dtype = 'P'
                        WHERE rno = p_old_rno;

                    SET v_rows = ROW_COUNT();

                    IF v_rows = 0 THEN
                        SET v_msg = 'No records updated in profile_bio';
                        SIGNAL SQLSTATE '45000';
                    END IF;

                    /* OTHER TABLE UPDATES */
                    UPDATE viewprofile SET rno=p_new_rno, ost='', status='A', dtype='P' WHERE rno=p_old_rno;
                    UPDATE profile_education SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE profile_organisation SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE profile_bs SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE profile_details SET rno=p_new_rno WHERE rno=p_old_rno;
                --     UPDATE profile_docs SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE profile_matches SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE profile_payment SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE profile_personal SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE profile_moreinfo SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE interaction SET rno=p_new_rno WHERE rno=p_old_rno;

                    UPDATE client_sl SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE client_sl SET proposal=p_new_rno WHERE proposal=p_old_rno;

                    UPDATE sendmail SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE sendmail SET proposal=p_new_rno WHERE proposal=p_old_rno;

                    UPDATE feedback SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE feedback SET proposal=p_new_rno WHERE proposal=p_old_rno;

                    UPDATE meeting SET rno=p_new_rno WHERE rno=p_old_rno;
                    UPDATE meeting SET proposal=p_new_rno WHERE proposal=p_old_rno;

                    DELETE FROM followup WHERE rno=p_old_rno;
                --     DELETE FROM prospective WHERE rno=p_old_rno;

                    /* SUCCESS LOG */
                    INSERT INTO convert_log
                    (
                        old_rno, new_rno, empid,
                        status, message,
                        dated, time,
                        created_at, updated_at
                    )
                    VALUES
                    (
                        p_old_rno, p_new_rno, p_empid,
                        'SUCCESS', 'Member converted successfully',
                        CURDATE(), CURTIME(),
                        NOW(), NOW()
                    );

                    COMMIT;

                    
                END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS memberconvert;");
    }
};
