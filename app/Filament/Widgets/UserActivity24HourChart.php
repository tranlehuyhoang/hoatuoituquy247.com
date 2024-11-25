<?php



namespace App\Filament\Widgets;


use App\Models\ActivityHistory;
use Filament\Widgets\BarChartWidget;
use Carbon\Carbon;

class UserActivity24HourChart extends BarChartWidget
{
    protected static ?string $heading = 'Biểu đồ Hoạt Động Người Dùng Trong 24 Giờ';
    protected static ?int $sort = 4;
    // Mặc định là 'today'
    public ?string $filter = 'today';

    // Định nghĩa các bộ lọc cho widget
    protected function getFilters(): array
    {
        return [
            'today' => 'Hôm nay',
            'this_week' => 'Tuần này',
            'this_month' => 'Tháng này',
            'this_year' => 'Năm nay',
        ];
    }

    protected function getData(): array
    {
        // Xử lý thời gian dựa vào bộ lọc đã chọn
        switch ($this->filter) {
            case 'this_week':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'this_month':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'this_year':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
            case 'today':
            default:
                $startDate = Carbon::now()->startOfDay();
                $endDate = Carbon::now()->endOfDay();
        }

        // Đếm số hoạt động theo từng giờ trong khoảng thời gian đã chọn
        $activityData = ActivityHistory::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('HOUR(created_at) as hour, COUNT(*) as count')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        // Tạo dữ liệu cho biểu đồ
        $hours = range(0, 23);
        $data = array_fill(0, 24, 0);

        foreach ($activityData as $activity) {
            $data[$activity->hour] = $activity->count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Số hoạt động',
                    'data' => $data,
                ],
            ],
            'labels' => array_map(function ($hour) {
                return $hour . ':00';
            }, $hours),
        ];
    }

    // Cập nhật khi bộ lọc thay đổi
    public function updatedFilter($filter)
    {
        $this->filter = $filter;
    }
}