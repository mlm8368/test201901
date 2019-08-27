<?php
return [
  'types' => [
    'archive' => [
      'query' => \unis\graphql\Archive::class,
      'mutation' => \unis\graphql\ArchiveMutation::class
    ],
    'user' => [
      'query' => \unis\graphql\User::class,
      'mutation' => \unis\graphql\UserMutation::class
    ]
  ]
];