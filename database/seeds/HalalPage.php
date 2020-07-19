<?php

use Illuminate\Database\Seeder;

class HalalPage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
          	'page' => 'halal',
          	'image' => '/images/cda-interview-guide.jpg',
            'content' => "<p>Halal is an Arabic word that means lawful or permissible. With regards to food, Halal is the Islamic dietary standards, as prescribed in the Qur'an, and the Hadith which is made up of the teachings or actions of Prophet Muhammad (pbuh). These Hadith provide interpretations of the Quranic verses. The Opposite of Halal is Haram which means unlawful or prohibited. </p>
              
              <p>Basically, all things created by God are lawful, with a few exceptions that are prohibited because they are harmful and impure. </p>
              
              <p> The life of a man is a compound of body and soul. Consumption of anything which is harmful to the body will harm the soul as well. </p>
              
              <p>Consuming Halal is an order from Allah (God) and an essential part of the Islamic faith. Allah has emphasized the consumption of Halal in His book. </p>
              <p> We eat in order to get and maintain a healthy and strong form so that we are able to work hard and contribute to the growth of our society. Therefore we should strive to consume food that is nourishing and avoid what is harmful to our bodies. </p>
              <p> The prohibition of some foods and drinks is by no means an unwarranted ruling, instead it is a divine intervention for man's own benefits and best interests. This prohibition is aimed at purification of man's nature because food has a direct effect to our health. When we eat food, it is absorbed and metabolized into our body system and circulates to all parts of the body, including the brain thereby affecting our characters and habits.</p>"
        ]);
    }
}
