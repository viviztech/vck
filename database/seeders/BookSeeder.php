<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Viduthalai Chiruthaigal: A Political Journey',
                'author' => 'Thol. Thirumavalavan',
                'category' => 'Political Literature',
                'description' => 'An insightful book about the political journey and ideology of Viduthalai Chiruthaigal Katchi.',
                'file_path' => 'books/sample-political-book.pdf',
                'sort_order' => 1,
            ],
            [
                'title' => 'Social Justice and Dalit Rights',
                'author' => 'VCK Publications',
                'category' => 'Social Justice',
                'description' => 'Comprehensive exploration of social justice issues and the fight for Dalit rights in Tamil Nadu.',
                'file_path' => 'books/sample-social-justice.pdf',
                'sort_order' => 1,
            ],
            [
                'title' => 'Tamil Nadu Politics: Modern Perspectives',
                'author' => 'Dr. K. Krishnasamy',
                'category' => 'Political Literature',
                'description' => 'Modern perspectives on Tamil Nadu politics and governance.',
                'file_path' => 'books/sample-tamil-politics.pdf',
                'sort_order' => 2,
            ],
            [
                'title' => 'Empowerment Through Education',
                'author' => 'VCK Education Wing',
                'category' => 'Education',
                'description' => 'Strategies and initiatives for educational empowerment of marginalized communities.',
                'file_path' => 'books/sample-education.pdf',
                'sort_order' => 1,
            ],
            [
                'title' => 'Legal Rights and Advocacy',
                'author' => 'VCK Legal Team',
                'category' => 'Legal Rights',
                'description' => 'Guide to legal rights and advocacy for social justice.',
                'file_path' => 'books/sample-legal-rights.pdf',
                'sort_order' => 1,
            ],
            [
                'title' => 'Community Development Initiatives',
                'author' => 'VCK Development Board',
                'category' => 'Community Development',
                'description' => 'Various community development initiatives and their impact.',
                'file_path' => 'books/sample-community-dev.pdf',
                'sort_order' => 1,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
