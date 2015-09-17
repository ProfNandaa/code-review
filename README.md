# code-review
A code review platform, integrated with GitHub

## Background
At [Andela](http://andela.com), I review student/fellow code as part of their learning, something we call _Checkpoints_. This is a small pet project that tries to aggregate the review feedback (comments made on the files in a commit).

A quick browse through the [GitHub API](https://developer.github.com/v3/repos/comments/#get-a-single-commit-comment), I found out that it's actually possible to pull comments from a repository. A simple example is this one here for [one of the Class 1 Nairobi fellows](https://api.github.com/repos/andela-bkagia/php-checkpoints/comments).

Let the hacking begin!
