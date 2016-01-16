<?php

abstract class AbstractBookFactory {/*{{{*/
    abstract function makePHPBook();
    abstract function makeMySQLBook();
}/*}}}*/

class OReillyBookFactory extends AbstractBookFactory {/*{{{*/
    private $context = "OReilly";
    function makeMySQLBook() {
        return new OReillyMySQLBook;
    }
    function makePHPBook() {
        return new OReillyPHPBook;
    }
}/*}}}*/

class SamsBookFactory extends AbstractBookFactory {/*{{{*/
    private $context = "Sams";
    function makeMySQLBook() {
        return new SamsMySQLBook;
    }
    function makePHPBook() {
        return new SamsPHPBook;
    }
}/*}}}*/



abstract class AbstractMySQLBook {/*{{{*/
    private $subject = "MySQL";
}/*}}}*/

class OReillyMySQLBook extends AbstractMySQLBook {/*{{{*/
    private $author;
    private $title;
    function __construct() {
        $this->author = 'George Reese, Randy Jay Yarger, and Tim King';
        $this->title = 'Managing and Using MySQL';
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}/*}}}*/

class SamsMySQLBook extends AbstractMySQLBook {/*{{{*/
    private $author;
    private $title;
    function __construct() {
        $this->author = 'Paul Dubois';
        $this->title = 'MySQL, 3rd Edition';
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}/*}}}*/



abstract class AbstractPHPBook {/*{{{*/
    private $subject = "PHP";
}/*}}}*/

class OReillyPHPBook extends AbstractPHPBook {/*{{{*/
    private $author;
    private $title;
    private static $oddOrEven = 'odd';
    function __construct()
    {
        //alternate between 2 books
        if ('odd' == self::$oddOrEven) {
            $this->author = 'Rasmus Lerdorf and Kevin Tatroe';
            $this->title = 'Programming PHP';
            self::$oddOrEven = 'even';
        }
        else {
            $this->author = 'David Sklar and Adam Trachtenberg';
            $this->title = 'PHP Cookbook';
            self::$oddOrEven = 'odd';
        }
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}/*}}}*/

class SamsPHPBook extends AbstractPHPBook {/*{{{*/
    private $author;
    private $title;
    function __construct() {
        //alternate randomly between 2 books
        mt_srand((double)microtime() * 10000000);
        $rand_num = mt_rand(0, 1);

        if (1 > $rand_num) {
            $this->author = 'George Schlossnagle';
            $this->title = 'Advanced PHP Programming';
        }
        else {
            $this->author = 'Christian Wenz';
            $this->title = 'PHP Phrasebook';
        }
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}/*}}}*/


  echo('BEGIN TESTING ABSTRACT FACTORY PATTERN' . "\n");

  echo("\n" . 'TESTING OREILLY BOOK FACTORY' . "\n");
  $bookFactoryInstance = new OReillyBookFactory;
  testConcreteFactory($bookFactoryInstance);

  echo("\n" . 'TESTING SAMS BOOK FACTORY' . "\n");
  $bookFactoryInstance = new SamsBookFactory;
  testConcreteFactory($bookFactoryInstance);


  function testConcreteFactory($bookFactoryInstance)
  {
      $phpBookOne = $bookFactoryInstance->makePHPBook();
      echo('first php Author: '.$phpBookOne->getAuthor() . "\n");
      echo('first php Title: '.$phpBookOne->getTitle() . "\n");

      $phpBookTwo = $bookFactoryInstance->makePHPBook();
      echo('second php Author: '.$phpBookTwo->getAuthor() . "\n");
      echo('second php Title: '.$phpBookTwo->getTitle() . "\n");

      $mySqlBook = $bookFactoryInstance->makeMySQLBook();
      echo('MySQL Author: '.$mySqlBook->getAuthor() . "\n");
      echo('MySQL Title: '.$mySqlBook->getTitle() . "\n");
  }


?>
