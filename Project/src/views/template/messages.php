<?php 

if($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
}
?>