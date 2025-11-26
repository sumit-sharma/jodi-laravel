<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         *
        DB::statement("insert ignore into jodi_laravel.profile_bio (rno,gender,refname,dob,tob,age,pob,religion,caste,subcaste,gotra,hght,hghtft,wtkg,complexion,dd,bg,astrostatus,drinkinghabit,smokinghabit,eatinghabit,spects,education,occupation,income,rs,ms,childstatus,dtype,payment,profiledate,empid,rfno,brand,created_at,updated_at) Select li.rno, li.gender, li.refname, li.dob, li.tob, li.age, li.pob, li.religion, li.caste, li.subcaste, li.gotra, li.hght, li.hghtft, li.wtkg, li.complexion, li.dd, li.bg, li.astrostatus, li.drinkinghabit, li.smokinghabit, li.eatinghabit, li.spects, li.education, li.occupation, li.income, li.rs, li.ms, li.childstatus, li.dtype, li.payment, li.profiledate, li.empid, li.rfno, li.brand, NOW(), NOW() from old_jodi.profile_bio as li");
        DB::statement("insert ignore into jodi_laravel.profile_bs (rno, bsname, bs, bsage, bsmarriage, bsdetails, created_at, updated_at) SELECT li.rno, li.bsname, li.bs, li.bsage, li.bsmarriage, li.bsdetails, NOW(), NOW() FROM old_jodi.profile_bs as li");
        DB::statement("insert ignore into jodi_laravel.profile_education (rno, educourse, eduinst, eduyear, created_at, updated_at) SELECT li.rno, li.educourse, li.eduinst, li.eduyear, NOW(), NOW() FROM old_jodi.profile_education as li");
        DB::statement("insert ignore into jodi_laravel.profile_organisation (rno, orgname, orgdept, orgyear, created_at, updated_at) SELECT li.rno, li.orgname, li.orgdept, li.orgyear, NOW(), NOW() FROM old_jodi.profile_organisation as li");
        DB::statement("insert ignore into jodi_laravel.profile_personal (rno, visa, rcity, rcountry, marriageinfo, child, childdetails, occdetails, familyvalue, familystatus, fathersname, mothersname, fatherdetails, motherdetails, fatherocc, motherocc, familyincome, familyincomem, typeoffamily, familynative, hobbies, characteristics, eyecolor, haircolor, salary, budget, nationality, familyhistory, contactperson, contactaddress, contactcity, contactstate, contactpincode, contactcountry, contactphone, contactemail, contactrelation, personaldetails, contactzone, arealocation, created_at, updated_at) SELECT li.rno, li.visa, li.rcity, li.rcountry, li.marriageinfo, li.child, li.childdetails, li.occdetails, li.familyvalue, li.familystatus, li.fathersname, li.mothersname, li.fatherdetails, li.motherdetails, li.fatherocc, li.motherocc, li.familyincome, li.familyincomem, li.typeoffamily, li.familynative, li.hobbies, li.characteristics, li.eyecolor, li.haircolor, li.salary, li.budget, li.nationality, li.familyhistory, li.contactperson, li.contactaddress, li.contactcity, li.contactstate, li.contactpincode, li.contactcountry, li.contactphone, li.contactemail, li.contactrelation, li.personaldetails, li.contactzone, li.arealocation, NOW(), NOW() FROM old_jodi.profile_personal as li");
        DB::statement("insert ignore into jodi_laravel.viewprofile (rno, g, refname, y, m, rl, cst, hg, hghtft, wt, eh, ast, ed, oc, pi, rs, ms, ch, fi, tc, mc, rm, p_sent, last_mail, last_call, last_mtng, dtype, status, ost, vc, op, st, created_at, updated_at) SELECT li.rno, li.g, li.refname, li.y, li.m, li.rl, li.cst, li.hg, li.hghtft, li.wt, li.eh, li.ast, li.ed, li.oc, li.pi, li.rs, li.ms, li.ch, li.fi, li.tc, li.mc, li.rm, li.p_sent, li.last_mail, li.last_call, li.last_mtng, li.dtype, li.status, li.ost, li.vc, li.op, li.st, NOW(), NOW() FROM old_jodi.viewprofile as li");

        DB::statement("insert ignore into jodi_laravel.profile_payment (rno, amount, dated, details, created_at, updated_at) SELECT li.rno, li.amount, li.dated, li.details, NOW(), NOW() FROM old_jodi.profile_payment as li");
        DB::statement("insert ignore into jodi_laravel.convert_log (old_rno, new_rno, empid, dated, created_at, updated_at) SELECT li.old_rno,  li.new_rno,  li.empid, li.dated, NOW(), NOW() FROM old_jodi.convert_log as li");

         */


    }
}



