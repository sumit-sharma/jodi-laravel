<?php
$proc = Illuminate\Support\Facades\DB::select("SHOW CREATE PROCEDURE sp_generate_dailyfullreport");
print_r($proc);
