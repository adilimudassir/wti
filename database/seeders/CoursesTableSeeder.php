<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'allow_partial_payments' => 0,
                'cost' => 50000,
                'created_at' => '2022-04-05 14:51:33',
                'description' => 'Learn Forex Trading',
                'duration' => '3 Month, Lifetime Mentorship',
                'id' => 1,
                'is_active' => 1,
            'outline' => '<h3>100 LEVEL (BEGINNER\'S COURSE OUTLINE)</h3>
<ul class="custom-listing custom-listing--checked mb-20">
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">WHAT IS FOREX</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">WHAT IS TRADED ON FOREX</p>
</li>
<li>WHO IS A FOREX BROKER</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">TERMINOLOGIES USED IN FOREX.</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">FORMS OF TRADING</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">CURRENCY PAIRS.</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">MT4 INTERFACE PART 1</p>
</li>
</ul>
<h3>200 LEVEL (INTERMEDIATE\'S COURSE OUTLINE)</h3>
<ul class="custom-listing custom-listing--checked mb-20">
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">INTRODUCTION</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">WHAT IS A PIP</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">CONCEPT OF BID AND ASK PRICE</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">WHAT IS A SPREAD</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">CONCEPT OF TAKE PROFIT</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">CONCEPT OF STOP LOSS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">LOT SIZE</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">LEVERAGE</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">FORMS OF TRADING ORDERS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">TRADING PLAN</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">COMMON MISTAKES BY TRADERS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">RISK MANAGEMENT</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">MT4 INTERFACE PART 2</p>
</li>
</ul>
<h3>300 LEVEL (ADVANCED\'S COURSE OUTLINE)</h3>
<ul class="custom-listing custom-listing--checked mb-20">
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">INTRODUCTION</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">INDICATORS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">MOVING AVERAGE STRATEGIES</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">PARABOLIC SAR</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">HOW TO LOCK PROFITS/TRAILING STOP</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">TIME FRAMES ANALYSIS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">STOCHASTIC OSCILLATOR</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">BOLLINGER BANDS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">RELATIVE STRENGTH INDEX (RSI)</p>
</li>
</ul>
<h3>400 LEVEL (PROFESSIONAL\'S COURSE OUTLINE)</h3>
<ul class="custom-listing custom-listing--checked mb-20">
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">INTRODUCTION</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">CANDLE STICK ANALYSIS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">SUPPORT &amp; RESISTANCE LEVEL</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">HOW TO TRADE SUPPORT AND RESISTANCE</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">PIVOT POINTS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">FORMS OF TRADING ORDERS II</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">FIBONNACCI TOOL</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">ELLIOT WAVES THEORY</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">FRACTALS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">FUNDAMENTAL ANALYSIS (NEWS TRADING USING NFP AS A PROTOTYPE</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">GAPS TRADING STRATEGY</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">ICHIMOKU HINKO HYO INDICATOR</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">CHART PATTERNS</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">CANDLE STICK ANALYSIS 2</p>
</li>
<li>
<p class="card-title text-dark bg-white pb-3 pl-2 pt-3">MENTORAHIP COURSE WITH THE CEO</p>
</li>
</ul>',
                    'partial_payments_allowed' => 0,
                    'slug' => 'forex-trading',
                    'title' => 'Forex Trading',
                    'updated_at' => '2022-04-05 17:13:00',
                ),
                1 => 
                array (
                    'allow_partial_payments' => 0,
                    'cost' => 80000,
                    'created_at' => '2022-04-05 14:51:33',
                    'description' => 'Learn Cryptocurrency Trading',
                    'duration' => '3 Month, Lifetime Mentorship',
                    'id' => 2,
                    'is_active' => 1,
                    'outline' => 'Course Outline',
                    'partial_payments_allowed' => 0,
                    'slug' => 'cryptocurrency-trading',
                    'title' => 'Cryptocurrency Trading',
                    'updated_at' => '2022-04-05 14:51:33',
                ),
                2 => 
                array (
                    'allow_partial_payments' => 0,
                    'cost' => 60000,
                    'created_at' => '2022-04-05 14:51:33',
                    'description' => 'Learn Stock Trading',
                    'duration' => '3 Month, Lifetime Mentorship',
                    'id' => 3,
                    'is_active' => 1,
                    'outline' => 'Course Outline',
                    'partial_payments_allowed' => 0,
                    'slug' => 'stock-trading',
                    'title' => 'Stock Trading',
                    'updated_at' => '2022-04-05 14:51:33',
                ),
            ));
        
        
    }
}