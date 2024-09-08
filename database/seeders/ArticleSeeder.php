<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $categories = Category::all();

        $articles = [
            [
                'title' => 'The Future of Artificial Intelligence in Everyday Life',
                'body' => 'Artificial Intelligence (AI) is rapidly transforming every aspect of our lives. From self-driving cars to virtual assistants like Siri and Alexa, AI is becoming an integral part of our daily existence. In this article, we explore the various ways AI is being used today and what the future holds for this groundbreaking technology.',
                'category' => 'technology',
                'featured' => true,
                'is_live' => true,
                'shared_count' => 1500,
            ],
            [
                'title' => '10 Simple Habits to Improve Your Health',
                'body' => 'Staying healthy does not have to be complicated or require extreme diets and fitness regimens. In this article, we discuss ten simple habits that you can incorporate into your daily routine to improve your overall health and well-being, such as drinking more water, eating a balanced diet, getting enough sleep, and staying physically active.',
                'category' => 'health',
                'featured' => false,
                'is_live' => true,
                'shared_count' => 2300,
            ],
            [
                'title' => 'How to Create a Balanced Lifestyle for Happiness and Success',
                'body' => 'A balanced lifestyle is key to achieving happiness and success. This article shares practical tips on managing work, family, and personal time to create a fulfilling life. We delve into strategies like time management, setting realistic goals, and maintaining a healthy work-life balance.',
                'category' => 'business',
                'featured' => true,
                'is_live' => true,
                'shared_count' => 1800,
            ],
            [
                'title' => 'The Rise of Cryptocurrencies: What You Need to Know',
                'body' => 'Cryptocurrencies have taken the financial world by storm. This article explains the basics of cryptocurrencies, their potential impact on traditional banking systems, and what you should consider before investing.',
                'category' => 'technology',
                'featured' => false,
                'is_live' => true,
                'shared_count' => 3000,
            ],
            [
                'title' => 'Sustainable Living: Small Changes for a Big Impact',
                'body' => 'With growing concerns about climate change, sustainable living has become more important than ever. Learn about simple changes you can make in your daily life to reduce your carbon footprint and contribute to a healthier planet.',
                'category' => 'business',
                'featured' => true,
                'is_live' => false,
                'shared_count' => 1200,
            ],
            [
                'title' => 'The Art of Effective Communication in the Workplace',
                'body' => 'Effective communication is crucial for success in any professional environment. This article provides tips and strategies for improving your communication skills, from active listening to giving constructive feedback.',
                'category' => 'health',
                'featured' => false,
                'is_live' => true,
                'shared_count' => 900,
            ],
            [
                'title' => 'Exploring the World of Plant-Based Diets',
                'body' => 'Plant-based diets have gained popularity for their health and environmental benefits. This article explores different types of plant-based diets, their potential health impacts, and tips for transitioning to a more plant-based lifestyle.',
                'category' => 'health',
                'featured' => true,
                'is_live' => true,
                'shared_count' => 2700,
            ],
            [
                'title' => 'The Power of Mindfulness: Improving Mental Health',
                'body' => 'Mindfulness practices have been shown to have significant benefits for mental health. This article introduces the concept of mindfulness, its benefits, and provides simple exercises to incorporate mindfulness into your daily routine.',
                'category' => 'business',
                'featured' => false,
                'is_live' => true,
                'shared_count' => 1600,
            ],
            [
                'title' => 'The Future of Remote Work: Trends and Predictions',
                'body' => 'The COVID-19 pandemic has accelerated the shift towards remote work. This article examines the current state of remote work, its challenges and benefits, and makes predictions about how it will shape the future of employment.',
                'category' => 'business',
                'featured' => true,
                'is_live' => false,
                'shared_count' => 2100,
            ],
            [
                'title' => 'Demystifying 5G Technology: What It Means for You',
                'body' => '5G technology promises faster speeds and more reliable connections. This article explains what 5G is, how it works, and what benefits and potential concerns come with this new technology.',
                'category' => 'technology',
                'featured' => false,
                'is_live' => true,
                'shared_count' => 1400,
            ],
            [
                'title' => 'The Importance of Financial Literacy in Today\'s World',
                'body' => 'Financial literacy is crucial for making informed decisions about money. This article discusses key financial concepts everyone should understand and provides resources for improving your financial knowledge.',
                'category' => 'technology',
                'featured' => true,
                'is_live' => true,
                'shared_count' => 1900,
            ],
            [
                'title' => 'Exploring the Benefits of Yoga for Mind and Body',
                'body' => 'Yoga offers numerous benefits for both physical and mental health. This article explores different types of yoga, their specific benefits, and how to get started with a yoga practice.',
                'category' => 'health',
                'featured' => false,
                'is_live' => true,
                'shared_count' => 2500,
            ],
        ];

        foreach ($articles as $article) {
            $category = $categories->firstWhere('slug', $article['category']);
            
            Article::create([
                'title' => $article['title'],
                'slug' => Str::slug($article['title']),
                'body' => $article['body'],
                'category_id' => $category->id,
                'user_id' => $user->id,
                'published' => true,
                'published_at' => now()->subDays(rand(1, 30)),
                'featured' => $article['featured'],
                'is_live' => $article['is_live'],
                'shared_count' => $article['shared_count'],
                'views' => rand(100, 5000),
                'tags' => json_encode(['tag1', 'tag2', 'tag3']),
            ]);
        }
    }
}