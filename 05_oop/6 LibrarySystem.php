<?php

// ==========================================
namespace Day2\no6;
// ==========================================
abstract class Person
{
    protected $name;
    protected $id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    abstract public function getRole();
}

// Student က Person ကို အမွေခံတယ်
class Student extends Person
{
    private $borrowedBooks = [];

    public function getRole()
    {
        return "Student";
    }

    public function borrowBook($bookTitle)
    {
        $this->borrowedBooks[] = $bookTitle;
    }

    public function getBorrowedBooks()
    {
        return $this->borrowedBooks;
    }

    public function getName()
    {
        return $this->name;
    }
}

// ==========================================
// ၂။ Encapsulation (စာအုပ်ရဲ့ ဒေတာတွေကို ကာကွယ်ခြင်း)
// ==========================================
class Book
{
    private $title;
    private $author;
    private $isAvailable;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isAvailable = true; // အစပိုင်းမှာ စာအုပ်က ရနေတယ်
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function isAvailable()
    {
        return $this->isAvailable;
    }

    public function setAvailability($status)
    {
        $this->isAvailable = $status;
    }
}

// ==========================================
// ၃။ Interface (စာအုပ်ငှားတဲ့ ဝန်ဆောင်မှုအတွက် စည်းမျဉ်း)
// ==========================================
interface LibraryService
{
    public function lendBook(Student $student, Book $book);
    public function returnBook(Student $student, Book $book);
}

// ==========================================
// ၄။ စနစ်တစ်ခုလုံးကို ထိန်းချုပ်မယ့် Class
// ==========================================
class Library implements LibraryService
{
    private $books = [];

    // စာအုပ်အသစ် ထည့်ခြင်း
    public function addBook(Book $book)
    {
        $this->books[] = $book;
        echo "📖 Added: " . $book->getTitle() . "\n";
    }

    // စာအုပ်ငှားပေးခြင်း (Interface က သတ်မှတ်ထားတဲ့အတိုင်း)
    public function lendBook(Student $student, Book $book)
    {
        if ($book->isAvailable()) {
            $book->setAvailability(false); // စာအုပ်ကို မရတော့အောင် ပြောင်းမယ်
            $student->borrowBook($book->getTitle()); // ကျောင်းသားဆီ မှတ်ထားမယ်
            echo  "\n" . $student->getName() . " borrowed '" . $book->getTitle() . "'\n";
        } else {
            echo " Sorry, '" . $book->getTitle() . "' is already borrowed.\n";
        }
    }

    // စာအုပ်ပြန်အပ်ခြင်း
    public function returnBook(Student $student, Book $book)
    {
        $book->setAvailability(true); // စာအုပ်ကို ပြန်ရအောင် လုပ်မယ်
        echo  "\n" . $student->getName() . " returned '" . $book->getTitle() . "'\n";
    }
}

// ==========================================
// ၅။ တကယ့် အသုံးပြုမှု (Testing)
// ==========================================

// စာကြည့်တိုက် ဖွင့်မယ်
$myLibrary = new Library();

// စာအုပ်တွေ ဝယ်ထည့်မယ်
$book1 = new Book("Learn PHP OOP", "U Aye");
$book2 = new Book("Clean Code", "Robert Martin");

$myLibrary->addBook($book1);
$myLibrary->addBook($book2);
echo "====================================";


$student1 = new Student("Mg Mg", "ST-001");
$student2 = new Student("Su Su", "ST-002");


$myLibrary->lendBook($student1, $book1);
$myLibrary->lendBook($student2, $book1); // ဒီစာအုပ်က ငှားထားပြီးသားမို့ မရတော့ဘူး
$myLibrary->lendBook($student2, $book2);
echo "=================================";


$myLibrary->returnBook($student1, $book1);



$myLibrary->lendBook($student2, $book1);

echo "=================================";
echo $student1->getName() . " ငှားထားတဲ့ စာအုပ်များ: " . implode(", ", $student1->getBorrowedBooks());
