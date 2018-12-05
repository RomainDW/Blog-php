<?php

namespace Controllers;


class BlogController extends Controller
{

    public function index() {

        $posts = $this->model->getAll('posts');

        echo $this->twig->render('front/blog/blog.html.twig', [
            'posts' => $posts
        ]);
    }

    public function post() {

        if (isset($_GET['id']) && $post = $this->blogModel->getPostById($_GET['id'])) {

            echo $this->twig->render('front/blog/post.html.twig', [
                'post' => $post
            ]);

        } else {
            $this->redirect404();
        }
    }
}