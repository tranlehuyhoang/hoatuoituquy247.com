<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Transactions extends Component
{
    public function mount()
    {
        $url = 'https://my.sepay.vn/userapi/transactions/list';
        $accountNumber = '104567890';
        $limit = 10;

        // Khởi tạo cURL
        $ch = curl_init();

        // Thiết lập các tùy chọn cho cURL
        curl_setopt($ch, CURLOPT_URL, $url . '?account_number=' . $accountNumber . '&limit=' . $limit);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ZTAMVHYFPJWVYTNXQWXEMAP5IOBUADBMH079LUDYBQJQRZLHZTUI2TXS3LS8F8PL',
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        // Thực hiện yêu cầu cURL
        $response = curl_exec($ch);

        // Kiểm tra lỗi cURL
        if (curl_errno($ch)) {
            return;
        }

        // Đóng cURL
        curl_close($ch);

        // Giải mã phản hồi JSON
        $data = json_decode($response, true);

            // Kiểm tra nếu tồn tại các giao dịch
            if (isset($data['status']) && $data['status'] === 200 && $data['messages']['success']) {
                foreach ($data['transactions'] as $transaction) {
                    // Kiểm tra nếu reference_number đã tồn tại
                    $exists = Transaction::where('reference_number', $transaction['reference_number'])->exists();

                    if (!$exists) {
                        Transaction::create([
                            'bank_brand_name' => $transaction['bank_brand_name'],
                            'account_number' => $transaction['account_number'],
                            'transaction_date' => $transaction['transaction_date'],
                            'amount_out' => $transaction['amount_out'],
                            'amount_in' => $transaction['amount_in'],
                            'accumulated' => $transaction['accumulated'],
                            'transaction_content' => $transaction['transaction_content'],
                            'reference_number' => $transaction['reference_number'],
                            'code' => $transaction['code'],
                            'sub_account' => $transaction['sub_account'],
                            'bank_account_id' => $transaction['bank_account_id'],
                        ]);
                    }
                }
            } else {
                Log::error('API response does not contain successful transactions or status code is incorrect.');
            }
    }
    public function render()
    {
        return view('livewire.transactions');
    }
}
