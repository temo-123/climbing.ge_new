<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = new About();
        $about->title = "About us";
        $about->text = "Text about";
        $about->short_description = "About description";

		$about->user_1 = "name1";
		$about->user_2 = "name2";
		$about->mail_1 = "abc@gmail.com";
		$about->mail_2 = "def@gmail.com";
		$about->num_1 = "598 12 34 56";
		$about->num_2 = "599 12 34 56";
		$about->leng_1_1 = "geo";
		$about->leng_1_2 = "rus";
		$about->leng_2_1 = "geo";
		$about->leng_2_2 = "rus";

		$about->activity_title_1 = "Indoor Climbing";
		$about->activity_title_2 = "Outdoor Climbing";
		$about->activity_title_3 = "Ice & Mixed";
		$about->activity_title_4 = "Mountaineering";
		$about->activity_text_1 = "text 1";
		$about->activity_text_2 = "text 2";
		$about->activity_text_3 = "text 3";
		$about->activity_text_4 = "text 4";
		$about->activity_img_1 = "indoor.png";
		$about->activity_img_2 = "outdoor.png";
		$about->activity_img_3 = "ice.png";
		$about->activity_img_4 = "mount.png";

        $about->map = '<iframe src="https://www.google.com/maps/d/u/1/embed?mid=1vp_Rgh8UmlN7nZGFGHChh_rRy1t5GdOv" width="100%" height="550"></iframe>';
        $about->meta_title = "Meta title";
        $about->meta_description = "Meta description";
        $about->meta_keyword = "Meta keyword";
        $about->save();
    }
}
