<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate(15);
        return view('admin.accounts.list', [
            'title' => 'Danh sách khách hàng',
            'accounts' => $accounts
        ]);
    }
    public function create()
    {
        // $a = Account::get();
        // return dd($a);

        return view('admin.accounts.add', [
            'title' => 'Thêm khách hàng',
        ]);
    }
    public function store(Request $request)
    {
        try {

            if (($request->input('account_birth') > Carbon::now('Asia/Ho_Chi_Minh'))) {
                session()->flash('error', 'Thêm thất bại. Vui lòng kiểm tra lại ngày sinh!');
                return redirect()->back();
            }
            Account::create([
                'account_name' => (string) $request->input('account_name'),
                'account_address' => (int) $request->input('account_address'),
                'account_phone' => (string) $request->input('account_phone'),
                'account_birth' => (string) $request->input('account_birth'),
            ]);

            session()->flash('success', 'Thêm khách hàng thành công.');
            return redirect()->back();
        } catch (\Exception $err) {
            session()->flash('error', 'Thêm khách hàng không thành công!');
            return redirect()->back();
        }
    }

    public function edit(Account $id)
    {
        return view('admin.accounts.edit', [
            'title' => 'Sửa thông tin khách hàng',
            'account' => $id
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            Account::where('id', $id)->update([
                'account_name' => (string) $request->input('account_name'),
                'account_address' => (int) $request->input('account_address'),
                'account_phone' => (string) $request->input('account_phone'),
                'account_birth' => (string) $request->input('account_birth'),
            ]);

            session()->flash('success', 'Sửa thông tin khách hàng thành công.');
            return redirect()->route('listAccout');
        } catch (\Exception $err) {
            session()->flash('error', 'Sửa thông tin khách hàng không thành công!');
            return redirect()->back();
        }
    }
    public function destroy(Request $request)
    {
        try {
            Account::where('id', $request->id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Xóa khách hàng thành công'
            ]);
        } catch (\Exception $err) {
            return response()->json([
                'code' => 500,
                'message' => 'Xóa khách hàng không thành công!'
            ]);
        }
    }
    public function search_byName(Request $request)
    {
        $accounts = Account::where('account_name', 'LIKE', '%' . $request->keyword_name . '%')->get();
        $html = '';
        foreach ($accounts as $account) {
            $html .= '<tr id="account_' . $account->id . '">';
            $html .= '<td>' . $account->id . '</td>';
            $html .= '<td>' . $account->account_name . '</td>';
            $html .= '<td>' . $account->account_address . '</td>';
            $html .= '<td>' . $account->account_phone . '</td>';
            $html .= '<td>' . $account->account_birth . '</td>';
            $html .= '<td><a class="btn btn-primary btn-sm" href="/admin/accounts/edit/' . $account->id . '">';
            $html .= '<i class="fas fa-edit"></i></a>';
            $html .= ' <a class="btn btn-danger btn-sm" onclick="removeAccount(' . $account->id . ')">';
            $html .= '<i class="fas fa-trash"></i></a></td></tr>';
        }

        return  response()->json(['html' => $html]);
    }
    public function search_byPhone(Request $request)
    {


        $accounts = Account::where('account_phone', 'LIKE', '%' . $request->keyword_phone . '%')->get();
        $html = '';
        foreach ($accounts as $account) {
            $html .= '<tr id="account_' . $account->id . '">';
            $html .= '<td>' . $account->id . '</td>';
            $html .= '<td>' . $account->account_name . '</td>';
            $html .= '<td>' . $account->account_address . '</td>';
            $html .= '<td>' . $account->account_phone . '</td>';
            $html .= '<td>' . $account->account_birth . '</td>';
            $html .= '<td><a class="btn btn-primary btn-sm" href="/admin/accounts/edit/' . $account->id . '">';
            $html .= '<i class="fas fa-edit"></i></a>';
            $html .= ' <a class="btn btn-danger btn-sm" onclick="removeAccount(' . $account->id . ')">';
            $html .= '<i class="fas fa-trash"></i></a></td></tr>';
        }


        return  response()->json(['html' => $html]);
    }
    public function search_byNameAndPhone(Request $request)
    {


        $accounts = Account::where('account_name', 'LIKE', '%' . $request->keyword_name . '%')
            ->where('account_phone', 'LIKE', '%' . $request->keyword_phone . '%')
            ->get();
        $html = '';
        foreach ($accounts as $account) {
            $html .= '<tr id="account_' . $account->id . '">';
            $html .= '<td>' . $account->id . '</td>';
            $html .= '<td>' . $account->account_name . '</td>';
            $html .= '<td>' . $account->account_address . '</td>';
            $html .= '<td>' . $account->account_phone . '</td>';
            $html .= '<td>' . $account->account_birth . '</td>';
            $html .= '<td><a class="btn btn-primary btn-sm" href="/admin/accounts/edit/' . $account->id . '">';
            $html .= '<i class="fas fa-edit"></i></a>';
            $html .= ' <a class="btn btn-danger btn-sm" onclick="removeAccount(' . $account->id . ')">';
            $html .= '<i class="fas fa-trash"></i></a></td></tr>';
        }


        return  response()->json(['html' => $html]);
    }
    public function filter_account_byAge(Request $request)
    {
        // 1: 18-25
        // 2: 26-30
        // 3: 31-45
        // 4: 46-60
        if ($request->key_min == 0 && $request->key_max == 0) {
            $accounts = Account::get();
            $html = '';
            foreach ($accounts as $account) {
                $html .= '<tr id="account_' . $account->id . '">';
                $html .= '<td>' . $account->id . '</td>';
                $html .= '<td>' . $account->account_name . '</td>';
                $html .= '<td>' . $account->account_address . '</td>';
                $html .= '<td>' . $account->account_phone . '</td>';
                $html .= '<td>' . $account->account_birth . '</td>';
                $html .= '<td><a class="btn btn-primary btn-sm" href="/admin/accounts/edit/' . $account->id . '">';
                $html .= '<i class="fas fa-edit"></i></a>';
                $html .= ' <a class="btn btn-danger btn-sm" onclick="removeAccount(' . $account->id . ')">';
                $html .= '<i class="fas fa-trash"></i></a></td></tr>';
            }
            return  response()->json(['html' => $html]);
        } else {
            $date1 = Carbon::now('Asia/Ho_Chi_Minh');
            $date2 = Carbon::now('Asia/Ho_Chi_Minh');
            $min = $date1->subYears($request->key_min);
            $max = $date2->subYears($request->key_max);


            $accounts = Account::where(
                'account_birth',
                '>=',
                $max
            )
                ->where(
                    'account_birth',
                    '<=',
                    $min
                )
                ->get();
            $html = '';
            foreach ($accounts as $account) {
                $html .= '<tr id="account_' . $account->id . '">';
                $html .= '<td>' . $account->id . '</td>';
                $html .= '<td>' . $account->account_name . '</td>';
                $html .= '<td>' . $account->account_address . '</td>';
                $html .= '<td>' . $account->account_phone . '</td>';
                $html .= '<td>' . $account->account_birth . '</td>';
                $html .= '<td><a class="btn btn-primary btn-sm" href="/admin/accounts/edit/' . $account->id . '">';
                $html .= '<i class="fas fa-edit"></i></a>';
                $html .= ' <a class="btn btn-danger btn-sm" onclick="removeAccount(' . $account->id . ')">';
                $html .= '<i class="fas fa-trash"></i></a></td></tr>';
            }
            return  response()->json(['html' => $html]);
        }
    }

    public function refresh_listAccount()
    {
        $accounts = Account::get();
        $html = '';
        foreach ($accounts as $account) {
            $html .= '<tr id="account_' . $account->id . '">';
            $html .= '<td>' . $account->id . '</td>';
            $html .= '<td>' . $account->account_name . '</td>';
            $html .= '<td>' . $account->account_address . '</td>';
            $html .= '<td>' . $account->account_phone . '</td>';
            $html .= '<td>' . $account->account_birth . '</td>';
            $html .= '<td><a class="btn btn-primary btn-sm" href="/admin/accounts/edit/' . $account->id . '">';
            $html .= '<i class="fas fa-edit"></i></a>';
            $html .= ' <a class="btn btn-danger btn-sm" onclick="removeAccount(' . $account->id . ')">';
            $html .= '<i class="fas fa-trash"></i></a></td></tr>';
        }


        return  response()->json(['html' => $html]);
    }
}
