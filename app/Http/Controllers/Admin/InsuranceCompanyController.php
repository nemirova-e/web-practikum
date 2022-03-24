<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;

class InsuranceCompanyController extends Controller
{
    public function index()
    {
        return view('admin.insurance-company.index', [
            'companies' => InsuranceCompany::all()
        ]);
    }

    public function create()
    {
        return view('admin.insurance-company.create');
    }

    public function store(Request $request)
    {
        $request->validate([

           'email' => 'required|unique:App\Models\InsuranceCompany,email',
           'name' => 'required|unique:App\Models\InsuranceCompany,name',
        ]);

        $company = new InsuranceCompany();
        $company->fill($request->all());
        $company->saveOrFail();


        return redirect()->route('admin.insurance-company.index')
            ->with('success', 'Компания успешно создана!');
    }

    public function show(InsuranceCompany $insuranceCompany)
    {
        return view('admin.insurance-company.show', [
            'company' => $insuranceCompany
        ]);
    }


    public function edit(InsuranceCompany $insuranceCompany)
    {
        return view ('admin.insurance-company.edit',[
            'company' => $insuranceCompany
        ]);
    }


    public function update(Request $request, InsuranceCompany $insuranceCompany)
    {
        $insuranceCompany->fill($request->all());
        $insuranceCompany->saveOrFail();

        return redirect()->route('admin.insurance-company.index')
            ->with('success','Компания успешно отредактирована!');
    }

    public function destroy(InsuranceCompany $insuranceCompany)
    {
        if ($insuranceCompany->products()->count() === 0) {
            $insuranceCompany->deleteOrFail();
            return redirect()->route('admin.insurance-company.index');
        }
        else {
            return redirect()->route('admin.insurance-company.index')
                ->with('error', 'Компания имеет продукты!');
        }
    }

}
