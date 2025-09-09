<?php

namespace App\Exports;

use App\Models\ProjectDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ProjectExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle, WithCustomStartCell, WithEvents
{
    public function collection()
    {
        return ProjectDetail::with('user')->get();
    }

    public function map($project): array
    {
        return [
            $project->id,
            $project->project_name,
            $project->user->name ?? 'N/A',
            $project->contractor_name,
            $project->consultant_name,
            $project->client_name,
            $project->bill_no,
            $project->bbs_for,
            $project->floor,
            $project->reference_drawing,
            $project->approved_by,
            $project->total_rf_weight,
            $project->created_at->format('d M Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'Revision ID',
            'Project Name',
            'Engineer Name',
            'Contractor Name',
            'Consultant Name',
            'Client Name',
            'Bill No.',
            'BBS For',
            'Floor',
            'Reference Drawing',
            'Approved By',
            'Total R/F Weight (kg)',
            'Created At',
        ];
    }

    public function startCell(): string
    {
        return 'A4';
    }

    public function title(): string
    {
        return 'BBS Projects';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            4 => [
                'font' => ['bold' => true, 'size' => 12],
                'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'E2EFDA']],
                'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', 'Bar Bending Schedule (BBS) - Project Report');
                $sheet->mergeCells('A1:M1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => '2F5233']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'C6E0B4']]
                ]);
                
                // Add generation date
                $sheet->setCellValue('A2', 'Generated on: ' . now()->format('d M Y H:i:s'));
                $sheet->mergeCells('A2:M2');
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => ['italic' => true, 'size' => 10],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]
                ]);
                
                // Style data rows
                $lastRow = $sheet->getHighestRow();
                $sheet->getStyle('A4:M' . $lastRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT]
                ]);
                
                // Auto-size columns
                foreach (range('A', 'M') as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }
                
                // Set row heights
                $sheet->getRowDimension(1)->setRowHeight(25);
                $sheet->getRowDimension(4)->setRowHeight(20);
            },
        ];
    }
}
