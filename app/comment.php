<?php
include __DIR__ . "/../bootstrap.php";

use src\Comment;

// get id from url
$id = $_GET['id'];

if($id){

    // if post request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // get post data
        $message = $_POST['comment'];
        $leaveId = $_POST['leaveId'];

        // create new comment
        $comment = new Comment();
        $comment->setComment($message);
        $comment->setLeaveId($leaveId);
        // save comment
        $entityManager->persist($comment);
        $entityManager->flush();
    }

    // get comments by leave
    $comments = $entityManager->getRepository("src\Comment")->findBy(["leaveId" => $id]);
    // get leave by id
    $leave = $entityManager->getRepository("src\Leave")->find($id);

    render("comment.html.twig", [
        "id" => $id,
        'comments' => $comments,
        'leave' => $leave
    ]);

}
