<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmailContent;
use DB;
use Illuminate\Support\LazyCollection;

class EmailContentSeeder extends Seeder
{
    public static function run()
    {
        // Create a new EmailContent record for the welcome email
        $emailContent = new EmailContent();
        $emailContent->type = 'welcome';
        $emailContent->subject = 'Welcome to the Placement Portal';


        // Store the body of the email
        $emailContent->body = <<<EOD
        We are delighted to welcome you to our Placement Portal! As you embark on your journey towards securing a successful career, our platform is designed to provide you with a seamless and comprehensive experience to assist you in your professional growth.

        Here’s how our Placement Portal can help you:

        -       *Personalized Opportunities*: Access a curated list of job and internship opportunities tailored to your skills and interests.
        -       *Resources and Guidance*: Benefit from expert tips, industry insights, and career advice to help you navigate your career path.
        -       *Professional Networking*: Connect with industry professionals, alumni, and peers to expand your professional network.
        -       *Support and Assistance*: Our dedicated team is here to support you throughout your journey and answer any questions you may have.

            We encourage you to log in to the Placement Portal regularly to explore the latest opportunities and make the most of the resources available to you.
            To get started, visit [https://student.geu.ac.in/] to log in to your account .
        EOD;

        // Store the conclusion of the email
        $emailContent->conclusion = 'We look forward to supporting you in your professional journey!
        Please note that this email address is not replaceable. Kindly refrain from replying to this email.If you have any questions or need assistance kindly contact placement cell physically.
        Thank You';
        // Save the record in the database
        $emailContent->save();
    }
}
