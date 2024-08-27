<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meta = [
            [
                "url" => "/",
                "title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_description" => "WeBeeSocial is a creative digital marketing agency in Delhi, India. We offer SEO, Performance and Social Media Marketing, Website design &amp; development services.",
                "og_title" => "agensy",
                "og_image" => "https://www.webeesocial.com/preview.png"
            ],
            [
                "url" => "about-us",
                "title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_description" => "WeBeeSocial is a creative digital marketing agency in Delhi, India. We offer SEO, Performance and Social Media Marketing, Website design &amp; development services.",
                "og_title" => "agensy",
                "og_image" => "https://www.webeesocial.com/preview.png"
            ],
            [
                "url" => "get-in-touch",
                "title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_description" => "WeBeeSocial is a creative digital marketing agency in Delhi, India. We offer SEO, Performance and Social Media Marketing, Website design &amp; development services.",
                "og_title" => "agensy",
                "og_image" => "https://www.webeesocial.com/preview.png"
            ],
            [
                "url" => "work-with-us",
                "title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_description" => "WeBeeSocial is a creative digital marketing agency in Delhi, India. We offer SEO, Performance and Social Media Marketing, Website design &amp; development services.",
                "og_title" => "agensy",
                "og_image" => "https://www.webeesocial.com/preview.png"
            ],
            [
                "url" => "our-services",
                "title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_description" => "WeBeeSocial is a creative digital marketing agency in Delhi, India. We offer SEO, Performance and Social Media Marketing, Website design &amp; development services.",
                "og_title" => "agensy",
                "og_image" => "https://www.webeesocial.com/preview.png"
            ],
            [
                "url" => "our-work",
                "title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_description" => "WeBeeSocial is a creative digital marketing agency in Delhi, India. We offer SEO, Performance and Social Media Marketing, Website design &amp; development services.",
                "og_title" => "agensy",
                "og_image" => "https://www.webeesocial.com/preview.png"
            ],
            [
                "url" => "blog",
                "title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_title" => "WeBeeSocial | Creative Agency New Delhi | Digital Marketing Company",
                "meta_description" => "WeBeeSocial is a creative digital marketing agency in Delhi, India. We offer SEO, Performance and Social Media Marketing, Website design &amp; development services.",
                "og_title" => "agensy",
                "og_image" => "https://www.webeesocial.com/preview.png"
            ]
        ];
        DB::table('metas')->insert($meta);
    }
}
