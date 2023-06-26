<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // Model::unguard();
        // $seeders = [
        //     RolesAndPermissionsSeeder::class,
        //     AdminUserSeeder::class,
        // ];

        // foreach ($seeders as $seeder) {
        //     $this->call($seeder);
        // }

        // $subject = \App\Models\Subject::factory()->create([
        //     'title' => 'Frontend',
        //     'description' => 'Frontend Developer',
        //     'created_by' => 1
        // ]);
        // $subjectId = $subject->id;

        // // Create topics and lessons
        // $topics = [
        //     [
        //         'title' => 'Introduction to HTML',
        //         'subject' => 'Frontend',
        //         'description' => 'Learn the basics of HTML and how to create web pages.',
        //         'created_by' => 1,
        //         'subject_id' => $subjectId,
        //         'lessons' => [
        //             ['title' => 'HTML Basics', 'description' => 'Learn the basics of HTML tags and attributes.'],
        //             ['title' => 'Text Formatting', 'description' => 'Learn how to format text using HTML tags.'],
        //             ['title' => 'Links and Images', 'description' => 'Learn how to add links and images to your web pages.'],
        //         ],
        //     ],
        //     [
        //         'title' => 'Introduction to CSS',
        //         'subject' => 'Frontend',
        //         'description' => 'Learn how to style your web pages using CSS.',
        //         'created_by' => 1,
        //         'subject_id' => $subjectId,
        //         'lessons' => [
        //             ['title' => 'CSS Basics', 'description' => 'Learn the basics of CSS selectors and properties.'],
        //             ['title' => 'Box Model', 'description' => 'Learn how the box model works and how to use it to create layouts.'],
        //             ['title' => 'Flexbox', 'description' => 'Learn how to use Flexbox to create flexible layouts.'],
        //             ['title' => 'Grid', 'description' => 'Learn how to use CSS Grid to create complex layouts.'],
        //         ],
        //     ],
        //     [
        //         'title' => 'JavaScript Fundamentals',
        //         'subject' => 'Frontend',
        //         'description' => 'Learn the basics of JavaScript programming.',
        //         'created_by' => 1,
        //         'subject_id' => $subjectId,
        //         'lessons' => [
        //             ['title' => 'Variables and Data Types', 'description' => 'Learn how to define variables and work with different data types in JavaScript.'],
        //             ['title' => 'Control Flow', 'description' => 'Learn how to use conditional statements and loops in JavaScript.'],
        //             ['title' => 'Functions', 'description' => 'Learn how to define and call functions in JavaScript.'],
        //             ['title' => 'Arrays and Objects', 'description' => 'Learn how to work with arrays and objects in JavaScript.'],
        //             ['title' => 'DOM Manipulation', 'description' => 'Learn how to manipulate the Document Object Model (DOM) using JavaScript.'],
        //         ],
        //     ],
        //     [
        //         'title' => 'Version Control Systems',
        //         'subject' => 'Frontend',
        //         'description' => 'Learn how to use version control systems to manage your code and collaborate with others.',
        //         'created_by' => 1,
        //         'subject_id' => $subjectId,
        //         'lessons' => [
        //             ['title' => 'Introduction to Git', 'description' => 'Learn the basics of Git and version control.'],
        //             ['title' => 'Branching and Merging', 'description' => 'Learn how to create and merge branches in Git.'],
        //             ['title' => 'Collaborating with Others', 'description' => 'Learn how to use Git to collaborate with others on a project.'],
        //             ['title' => 'GitHub', 'description' => 'Learn how to use GitHub to host and share your Git repositories.'],
        //         ],
        //     ],
        //     [
        //         'title' => 'Package Managers',
        //         'subject' => 'Frontend',
        //         'description' => 'Learn how to use package managers to manage your project dependencies.',
        //         'created_by' => 1,
        //         'subject_id' => $subjectId,
        //         'lessons' => [
        //             ['title' => 'Introduction to Package Managers', 'description' => 'Learn the basics of package managers and how they work.'],
        //             ['title' => 'npm', 'description' => 'Learn how to use npm to install and manage packages for your JavaScript projects.'],
        //             ['title' => 'Yarn', 'description' => 'Learn how to use Yarn as an alternative to npm for managing your project dependencies.'],
        //         ],
        //     ],
        //     [
        //         'title' => 'Build Tool',
        //         'subject' => 'Frontend',
        //         'description' => 'Learn how to use build tools to automate repetitive tasks in your development workflow.',
        //         'created_by' => 1,
        //         'subject_id' => $subjectId,
        //         'lessons' => [
        //             ['title' => 'Introduction to Build Tools', 'description' => 'Learn the basics of build tools and why they are important.'],
        //             ['title' => 'Task Runners', 'description' => 'Learn how to use task runners like Grunt and Gulp to automate your workflow.'],
        //             ['title' => 'Webpack', 'description' => 'Learn how to use Webpack to bundle and optimize your code for production.'],
        //         ],
        //     ],
        //     [
        //         'title' => 'Responsive Web Design',
        //         'subject' => 'Frontend',
        //         'description' => 'Learn how to create websites that work well on all devices.',
        //         'created_by' => 1,
        //         'subject_id' => $subjectId,
        //         'lessons' => [
        //             ['title' => 'Mobile-First Design', 'description' => 'Learn how to design websites for mobile devices first, and then scale up to larger screens.'],
        //             ['title' => 'Media Queries', 'description' => 'Learn how to use media queries to adjust your website\'s layout and styles based on screen size.'],
        //             ['title' => 'Viewport and Units', 'description' => 'Learn how to use viewport meta tags and CSS units to create responsive designs.'],
        //         ],
        //     ],
        // ];

        // foreach ($topics as $topicData) {
        //     $topic = \App\Models\Topic::factory()->create([
        //         'title' => $topicData['title'],
        //         'description' => $topicData['description'],
        //         'created_by' => $topicData['created_by'],
        //         'subject_id' => $topicData['subject_id']
        //     ]);
        //     foreach ($topicData['lessons'] as $lessonData) {
        //         $lesson = \App\Models\Lesson::factory()->create([
        //             'title' => $lessonData['title'],
        //             'description' => $lessonData['description'],
        //             'created_by' => $topicData['created_by'],
        //             'topic_id' => $topic->id
        //         ]);
        //     }
        // }
    }
}
