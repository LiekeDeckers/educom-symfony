<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

#[AsCommand(
    name: 'app:import-spreadsheet',
    description: 'Import Excel Spreadsheet',
)]

class ImportSpreadsheetCommand extends Command
{
    private $poppodiumService;
    
    public function __construct(PoppodiumService $poppodiumService) {        
        $this->poppodiumService = $poppodiumService;   
    }

    protected function configure()
    {
        $this
            ->setHelp('This command allows you to import a spreadsheet')
            ->addArgument('file', InputArgument::REQUIRED, 'Spreadsheet')
        ;   
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputFileName = $input->getArgument('file');
        $spreadsheet = IOFactory::load($inputFileName);         // Here we are able to read from the excel file 

        $row = $spreadsheet->getActiveSheet()->removeRow(1);    // To be able to remove the first file line 
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);   // here, the read data is turned into an array

        foreach ($sheetData as $row) {
            $data = [
                "naam" => $row[0],
                "adres" => $row[1],
                "postcode" => $row[2],
                "woonplaats" => $row[3],
                "telefoonnummer" => $row[4],
                "email" => $row[5],
                "website" => $row[6],
                "logo_url" => $row[7],
                "afbeelding_url" => $row[8],
            ];
        }

        $result = $this->poppodiumService->savePodium($data);
        return($result);
    }
}
