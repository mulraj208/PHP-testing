<?php


namespace App;


class Quiz
{
    protected $questions;

    protected $currentQuestion = 1;

    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function nextQuestion()
    {
        if (!isset($this->questions[$this->currentQuestion - 1])) {
            return false;
        }

        $question = $this->questions[$this->currentQuestion - 1];

        $this->currentQuestion++;

        return $question;
    }

    public function questions()
    {
        return $this->questions;
    }

    public function grade()
    {
        if (!$this->isQuizCompleted()) {
            throw new \Exception('Quiz is not completed. Complete the quiz to see the grade');
        }

        $correct = count($this->correctlyAnsweredQuestions());

        return ($correct / count($this->questions)) * 100;
    }

    public function isQuizCompleted()
    {
        $answered_questions = count(array_filter($this->questions, function ($question) {
            return $question->isAnswered();
        }));
        $total_questions = count($this->questions);

        return $answered_questions === $total_questions;
    }

    protected function correctlyAnsweredQuestions()
    {
        return array_filter($this->questions, function ($question) {
            return $question->solved();
        });
    }
}