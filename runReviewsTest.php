<?php
  include "classReviews.php";
  
  // Create the object
  $reviewsSystem = new reviewsClass;
  
  // Add some reviews
  $addReviews = [
    [ // Fail because no score is present
      "score"   => 0,
      "name"    => "John Doe",
      "comment" => "Not happy!",
      "date"    => "",
    ],
    [ // Successfully gets added
      "score"   => 4,
      "name"    => "Spiros Aliprantis",
      "comment" => "Very good service!",
      "date"    => "",
    ],
    [ // Successfully gets added
      "score"   => 5,
      "name"    => "Alex Smith",
      "comment" => "Very happy with the service!",
      "date"    => "12/02/2020",
    ],
    [ // Fails because score is out of range
      "score"   => 6,
      "name"    => "Debbie Watson",
      "comment" => "Very happy with the service!",
      "date"    => "12/02/2020",
    ],
    [ // Fails because date is not valid
      "score"   => 1,
      "name"    => "Bill Mean",
      "comment" => "Very disapointed with the service!",
      "date"    => "31/02/2020",
    ],
    [ // Fails because name is missing
      "score"   => 3,
      "name"    => "",
      "comment" => "Not happy!",
      "date"    => "12/12/2012",
    ],
    [ // Fails because comment is missing
      "score"   => 3,
      "name"    => "Ben Fin",
      "comment" => "",
      "date"    => "06/03/1997",
    ],
    [ // Fails because comment is not a string
      "score"   => 3,
      "name"    => "Ben Fin",
      "comment" => 6,
      "date"    => "06/03/1997",
    ],
  ];
  
  // Display avg with empty object
  $reviewsSystem->displayAvgScore();
  
  // Add reviews to the object
  foreach ($addReviews as $review) {
    $reviewsSystem->addReview($review["score"], $review["name"], $review["comment"], $review["date"]);
  }
  
  // Display all reviews
  $reviewsSystem->displayReviews();
  
  // Display latest avg score
  $reviewsSystem->displayAvgScore();
