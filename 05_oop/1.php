<?php

namespace App\Services;

class Student
{
    // ၁။ Property တွေ ကြေညာတဲ့အခါ $ ပါရမယ်
    public $name;
    public $mark;

    public function showInfo()
    {
        // ၂။ $this->name ရဲ့ နောက်မှာ -> ပါရမယ်၊ $ ထပ်မထည့်ရဘူး ($this->$name လို့ မရေးရဘူး)
        return "Name: " . $this->name . ", Mark: " . $this->mark;
    }
}

// ၃။ Object ဆောက်တဲ့အခါ new Student(); လို့ ကွင်းလေး ပါရမယ်
$student1 = new Student();

// ၄။ Property တွေ ထည့်တဲ့အခါ -> ကို သုံးရမယ်
$student1->name = "Mg Mg";
$student1->mark = 85;

echo $student1->showInfo();
