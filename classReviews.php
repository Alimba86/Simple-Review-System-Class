<?php

class reviewsClass
{
  public $reviews = [];
  public $avgScore = 0;
  
  public function addReview($score, $name, $comment, $date) {
    try {
      $this->checkInput($score, $name, $comment);
      
      if (empty($date)) {
        $date = new DateTime();
      } else {
        $date = new DateTime($date);
      }
      
      $this->reviews[] = [
        "score"     => $score,
        "name"      => $name,
        "comment"   => $comment,
        "datetime"  => $date,
      ];
      
      // Update avg score
      $countReviews = count($this->reviews);
      $sumScores    = 0;
      
      foreach ($this->reviews as $review) {
        $sumScores = $sumScores + $review["score"];
      }
      
      if ($sumScores > 0 && $countReviews > 0) {
        $this->avgScore = $sumScores / $countReviews;
      }
    } catch (Exception $e) {
      echo 'Error: ',  $e->getMessage(), "\n";
    }
  }
  
  public function displayReviews() {
    foreach ($this->reviews as $review) {
      print_r($review);
    }
  }
  
  public function displayAvgScore() {
    // Output avg score and format it with 2 demical
    echo 'Average Score: ' . number_format($this->avgScore, 2) . PHP_EOL;
  }
  
  private function checkInput($score, $name, $comment) {
    if ($score <= 0 || $score > 5) {
      throw new Exception('Score out of range.');
    }
    
    if (
        (
          empty($name)
          || !is_string($name)
        ) 
        || 
        (
          empty($comment)
          || !is_string($comment)
        )
       ) {
      throw new Exception('Name and/or Comment are mandatory field and must be text.');
    }
  }
}
