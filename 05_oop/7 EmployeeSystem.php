<?php

// ==========================================
// ၁။ Interface (အလုပ်သမားတိုင်း လိုက်နာရမယ့် စည်းမျဉ်း)
// ==========================================
interface Payable
{
    public function calculateSalary();
    public function getDetails();
}

// ==========================================
// ၂။ Abstract Class (အလုပ်သမားတိုင်းရဲ့ အခြေခံပုံစံ)
// ==========================================
abstract class Employee implements Payable
{
    protected $name;
    protected $id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    // Abstract method ကို ကလေးတွေ (Child) က မဖြစ်မနေ ရေးရမယ်
    abstract public function calculateSalary();

    // ဒီ Method ကို အားလုံး အတူတူ သုံးလို့ရတယ်
    public function getDetails()
    {
        return "ID: {$this->id} | Name: {$this->name}";
    }
}

// ==========================================
// ၃။ Full-time Employee (အချိန်ပြည့် ဝန်ထမ်း)
// ==========================================
class FullTimeEmployee extends Employee
{
    private $monthlySalary;

    public function __construct($name, $id, $monthlySalary)
    {
        parent::__construct($name, $id); // မိဘ Class ရဲ့ Constructor ကို ခေါ်တယ်
        $this->monthlySalary = $monthlySalary;
    }

    // Polymorphism - သူ့ပုံစံနဲ့ သူ တွက်တယ်
    public function calculateSalary()
    {
        return $this->monthlySalary;
    }

    // Override လုပ်ထားတယ် (ပိုပြီး အသေးစိတ်ပြချင်လို့)
    public function getDetails()
    {
        return parent::getDetails() . " | Type: Full-Time";
    }
}

// ==========================================
// ၄။ Part-time Employee (အချိန်ပိုင်း ဝန်ထမ်း)
// ==========================================
class PartTimeEmployee extends Employee
{
    private $hourlyRate;
    private $hoursWorked;

    public function __construct($name, $id, $hourlyRate, $hoursWorked)
    {
        parent::__construct($name, $id);
        $this->hourlyRate = $hourlyRate;
        $this->hoursWorked = $hoursWorked;
    }

    // Polymorphism - သူ့ပုံစံနဲ့ သူ တွက်တယ်
    public function calculateSalary()
    {
        return $this->hourlyRate * $this->hoursWorked;
    }

    public function getDetails()
    {
        return parent::getDetails() . " | Type: Part-Time";
    }
}

// ==========================================
// ၅။ လစာစာရင်း ထုတ်ပေးမယ့် စနစ်
// ==========================================
class PayrollSystem
{
    private $employees = [];

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    // ဝန်ထမ်းအားလုံးရဲ့ လစာကို တွက်ပြီး ပြမယ်
    public function printPayroll()
    {
        echo "Monthly Payroll Report";

        $totalPayout = 0;

        // ဒီနေရာမှာ Polymorphism ရဲ့ အားသာချက်ကို မြင်ရမယ်
        foreach ($this->employees as $employee) {
            $salary = $employee->calculateSalary(); // Full-time လား၊ Part-time လား မခွဲခြားဘဲ ခေါ်လို့ရတယ်
            $totalPayout += $salary;

            echo "\n" . $employee->getDetails() . "\n";
            echo "Salary: " . number_format($salary) . " MMK\n\n";
        }

        echo "Total Payout: " . number_format($totalPayout) . " MMK";
    }
}

// ==========================================

// ==========================================

$payroll = new PayrollSystem();

// ဝန်ထမ်းတွေ ခန့်ထားမယ်
$emp1 = new FullTimeEmployee("Mg Mg", "EMP-001", 500000);
$emp2 = new PartTimeEmployee("Su Su", "EMP-002", 5000, 80); // တစ်နာရီ 5000 နှုန်း၊ 80 နာရီ
$emp3 = new FullTimeEmployee("Aung Aung", "EMP-003", 750000);
$emp4 = new PartTimeEmployee("Kyaw Kyaw", "EMP-004", 4000, 100);

// စနစ်ထဲကို ထည့်မယ်
$payroll->addEmployee($emp1);
$payroll->addEmployee($emp2);
$payroll->addEmployee($emp3);
$payroll->addEmployee($emp4);

// လစာစာရင်း ထုတ်မယ်
$payroll->printPayroll();
