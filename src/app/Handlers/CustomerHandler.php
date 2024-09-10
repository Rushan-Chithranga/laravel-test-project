<?php

namespace App\Handlers;

use App\Mail\JobCompletedMail;
use App\Mail\sendCredintialMail;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Masmerise\Toaster\Toastable;
use Masmerise\Toaster\Toaster;

class CustomerHandler

{
    use Toastable;
    public static function customerSearch($search)
    {
        return Customer::query()
            ->when($search, function ($query, $search) {
                $query->where('email', 'like', '%' . $search . '%');
            })
            ->paginate(8);
    }
    public static function createCustomer($name, $NIC, $email, $phone, $address, $password)
    {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $name,
                'NIC' => $NIC,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'password' => Hash::make($password),
            ];

            $user = [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ];

            User::create($user);
            Customer::create($data);
            Mail::to($email)->send(new sendCredintialMail($email, $name, $password));
            DB::commit();
            Toaster::success('Email sent successfully');
            Toaster::success('Customer Created Successfully!!');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            Toaster::error('Failed to create customer. Please try again.');
            throw $e;
        }
    }


    public static function updateCustomer($id, $name, $NIC, $email, $phone, $address)
    {

        $customer = Customer::findOrFail($id);

        $customer->fill([
            'name' => $name,
            'NIC' => $NIC,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
        ])->save();

        Toaster::success('Customer Updated Successfully!!');
    }

    public static function deleteCustomer($id)
    {

        $cutomer = Customer::findOrFail($id);
        $cutomer->delete();
        Toaster::success('Customer Deleted Successfully!!');
        return redirect(request()->header('Referer'));
    }
}
