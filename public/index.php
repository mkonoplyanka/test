<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Hw6\Models\Category;
use Hillel\Hw6\Models\Post;
use Hillel\Hw6\Models\Tag;

//1. Створити 5 категорій (insert)

//$cat1 = new Category();
//
//$cat1->title = 'Top of the richest people 2022';
//$cat1->slug = 'What is \'slug\' ?';
//$cat1->save();
//
//$cat2 = new Category();
//
//$cat2->title = 'Sport';
//$cat2->slug = 'What is \'slug\' ?';
//$cat2->save();
//
//$cat3 = new Category();
//
//$cat3->title = 'History';
//$cat3->slug = 'What is \'slug\' ?';
//$cat3->save();
//
//$cat4 = new Category();
//
//$cat4->title = 'Daily Prophet';
//$cat4->slug = 'What is \'slug\' ?';
//$cat4->save();
//
//$cat5 = new Category();
//
//$cat5->title = 'Title #5';
//$cat5->slug = 'What is \'slug\' ?';
//$cat5->save();

//2. Змінити 1 категорію (update)

//$cat1 = Category::find(1);
//
//$cat1->title = 'Changed title';
//$cat1->save();

//3. Видалити 1 категорію (delete).

//$cat = Category::find(5);
//
//$cat->delete();

//4. Створити 10 постів, прикріпивши довільну категорію.

//$post1 = new Post();
//
//$post1->title = 'Post title';
//$post1->slug = 'Post slug';
//$post1->body = 'Lorem ipsum ...';
//$post1->category_id = 1;
//$post1->save();
//
//$post2 = new Post();
//
//$post2->title = 'Post title';
//$post2->slug = 'Post slug';
//$post2->body = 'Lorem ipsum ...';
//$post2->category_id = 1;
//$post2->save();
//
//$post3 = new Post();
//
//$post3->title = 'Post title';
//$post3->slug = 'Post slug';
//$post3->body = 'Lorem ipsum ...';
//$post3->category_id = 1;
//$post3->save();
//
//$post4 = new Post();
//
//$post4->title = 'Post title';
//$post4->slug = 'Post slug';
//$post4->body = 'Lorem ipsum ...';
//$post4->category_id = 1;
//$post4->save();
//
//$post5 = new Post();
//
//$post5->title = 'Post title';
//$post5->slug = 'Post slug';
//$post5->body = 'Lorem ipsum ...';
//$post5->category_id = 1;
//$post5->save();
//
//$post6 = new Post();
//
//$post6->title = 'Post title';
//$post6->slug = 'Post slug';
//$post6->body = 'Lorem ipsum ...';
//$post6->category_id = 1;
//$post6->save();
//
//$post7 = new Post();
//
//$post7->title = 'Post title';
//$post7->slug = 'Post slug';
//$post7->body = 'Lorem ipsum ...';
//$post7->category_id = 1;
//$post7->save();
//
//$post8 = new Post();
//
//$post8->title = 'Post title';
//$post8->slug = 'Post slug';
//$post8->body = 'Lorem ipsum ...';
//$post8->category_id = 1;
//$post8->save();
//
//$post9 = new Post();
//
//$post9->title = 'Post title';
//$post9->slug = 'Post slug';
//$post9->body = 'Lorem ipsum ...';
//$post9->category_id = 1;
//$post9->save();
//
//$post10 = new Post();
//
//$post10->title = 'Post title';
//$post10->slug = 'Post slug';
//$post10->body = 'Lorem ipsum ...';
//$post10->category_id = 1;
//$post10->save();

//5. Оновити 1 пост, замінивши поля + категорію.

//$post = Post::find(1);
//
//$post->title = 'CHANGED';
//$post->slug = 'CHANGED';
//$post->category_id = 2;
//$post->save();

//6. Видалити пост.

//$post = Post::find(10);
//$post->delete();

//7. Створити 10 тегів

//$tag1 = new Tag();
//
//$tag1->title = 'Tag title';
//$tag1->slug = 'Tag slug';
//$tag1->save();
//
//$tag2 = new Tag();
//
//$tag2->title = 'Tag title';
//$tag2->slug = 'Tag slug';
//$tag2->save();
//
//$tag3 = new Tag();
//
//$tag3->title = 'Tag title';
//$tag3->slug = 'Tag slug';
//$tag3->save();
//
//$tag4 = new Tag();
//
//$tag4->title = 'Tag title';
//$tag4->slug = 'Tag slug';
//$tag4->save();
//
//$tag5 = new Tag();
//
//$tag5->title = 'Tag title';
//$tag5->slug = 'Tag slug';
//$tag5->save();
//
//$tag6 = new Tag();
//
//$tag6->title = 'Tag title';
//$tag6->slug = 'Tag slug';
//$tag6->save();
//
//$tag7 = new Tag();
//
//$tag7->title = 'Tag title';
//$tag7->slug = 'Tag slug';
//$tag7->save();
//
//$tag8 = new Tag();
//
//$tag8->title = 'Tag title';
//$tag8->slug = 'Tag slug';
//$tag8->save();
//
//$tag9 = new Tag();
//
//$tag9->title = 'Tag title';
//$tag9->slug = 'Tag slug';
//$tag9->save();
//
//$tag10 = new Tag();
//
//$tag10->title = 'Tag title';
//$tag10->slug = 'Tag slug';
//$tag10->save();

//8. Кожному вже збереженому посту прикріпити по 3 випадкові теги.

$posts = Post::all();
$tags = Tag::find([4, 7, 3]);

foreach ($posts as $post) {
    $post->tags()->attach($tags);
}

