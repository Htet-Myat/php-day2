<?php

interface Payment
{
    public function pay(float $amount): string;
}

class CashPayment implements Payment
{
    public function pay(float $amount): string
    {
        return "Paid $amount MMK by Cash.";
    }
}

$payment = new CashPayment();

echo $payment->pay(50000);
