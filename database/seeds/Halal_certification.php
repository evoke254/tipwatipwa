<?php

use Illuminate\Database\Seeder;

class Halal_certification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('pages')->insert([
          	'page' => 'Halal Certification',
          	'image' => '/images/cda-interview-guide.jpg',
            'content' => "<p>Halal certification is a process by which a credible Islamic organization certifies that a company's products has undergone thorough inspection and has been found to conform to the Islamic dietary laws and can therefore be lawfully consumed by Muslims.
				</p>
				<p>Having met these stringent certification criteria a halal certificate and logo are issued. The halal logo or symbol can be imprinted on the packaging materials of the certified product or used in any form of advertisement. </p>

              <h4 class='text-center'>Benefits of Halal Certification</h4>
              
              <ul>
              	<li>
              		By Consuming Halal products you are fulfilling Allah's instructions that mankind should only consume what is lawful. When a product is Halal certified, the consumer has full confidence and assurance that there are no doubtful ingredients whatsoever contained in the product and therefore the consumer has no cause to worry on the Halal status of their favourite products.
              	</li>
              	<li> 
              		Halal certification of products being exported instills confidence to the consumers from the importing countries that these products have been strictly inspected right from their source to their point of sale and the certifying body guarantees that the products meet the required dietary standards.
              	</li>
              	<li>To the producer, the benefits gained by Halal Certification are equally great. With the Halal market hastily growing and increase in demand of Halal products all over the world, a KBHC Halal certified producer stands a great chance of capturing new export markets and compete effectively in this significant market segment.</li>

					<li>Through KBHC Halal certification a producer is able to enhance marketability of products to the Muslim markets both locally and internationally because the KBHC logo serves as confirmation that the products are truly Halal</li>.

					<li>KBHC Halal certification serves as an image booster to the producer especially in this era of excessive deceit and false labeling. KBHC being a member of World Halal Council means that its certification procedures are recognized and acceptable internationally. KBHC certification is a seal of approval that products have been properly supervised and meet all the Halal status requirements.</li>

					<li>KBHC Halal certified companies and there products are displayed on our website, www.kbhc.info The products shall be viewed by Muslims estimated at 1.4 billion and non-Muslims consumers worldwide.</li>

					<li>Halal compliant companies and their products are publicized in the KBHC magazine which is published quarterly. This will ensure that consumers are constantly informed on the availability of various Halal products in the market, the product sources and new companies being certified by KBHC.</li>

					<li>KBHC conducts various trainings to some of the certified establishements. During these trainings, variety of learning tools and materials e.g. videos, practical sessions and examples are used to ensure effective conveyance of vital information to the trainees. Thereafter, proficiency certificates are issued to participants.</li>
              </ul>



             "
        ]);
    }
}



