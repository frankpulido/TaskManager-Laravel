<?php

use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER update_project_delivered
            AFTER UPDATE ON tasks
            FOR EACH ROW
            BEGIN
                IF (SELECT COUNT(*) FROM tasks WHERE project_id = NEW.project_id AND task_status != "RELEASED") = 0 THEN
                    UPDATE projects SET delivered = 1 WHERE id = NEW.project_id;
                ELSE
                    UPDATE projects SET delivered = 0 WHERE id = NEW.project_id;
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_project_delivered');
    }
};