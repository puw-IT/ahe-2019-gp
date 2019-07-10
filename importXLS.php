<?php
error_reporting(E_ALL);

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

define('LIB_PATH', '');

include(LIB_PATH.'simple-cache-master/src/CacheInterface.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Helper/Sample.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Spreadsheet.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Calculation/Calculation.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Calculation/Category.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Calculation/Functions.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Calculation/Engine/CyclicReferenceStack.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Calculation/Engine/Logger.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Calculation/Token/Stack.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/IComparable.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/StringHelper.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Collection/Cells.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Collection/Memory.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Settings.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Collection/CellsFactory.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/PageSetup.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/PageMargins.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/HeaderFooter.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/SheetView.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/Protection.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/Dimension.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/RowDimension.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/ColumnDimension.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/AutoFilter.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Supervisor.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Color.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Font.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Fill.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Border.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Borders.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Alignment.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/NumberFormat.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Protection.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Style/Style.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Document/Security.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Document/Properties.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Cell/Coordinate.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Cell/IValueBinder.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Cell/DefaultValueBinder.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Cell/Cell.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Cell/DataType.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/ReferenceHelper.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/Iterator.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/IOFactory.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/IWriter.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/BaseWriter.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/OLE/PPS.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/OLE/PPS/File.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/OLE.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/OLE/PPS/Root.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/OLERead.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/CodePage.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/File.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/Xls.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/Xls/Parser.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/Xls/BIFFwriter.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/Xls/Workbook.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/Xls/Worksheet.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/Xls/Xf.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/Xls/Font.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/Font.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Shared/Date.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Worksheet/Worksheet.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/IReader.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/BaseReader.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/IReadFilter.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/DefaultReadFilter.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Xls/Style/Border.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Xls/Style/FillPattern.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Xls/Color/BuiltIn.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Xls/Color.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Xls.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Security/XmlScanner.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Xlsx.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Xml.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Ods.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Slk.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Gnumeric.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Html.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Csv.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Exception.php');
include(LIB_PATH.'PhpSpreadsheet-master/src/PhpSpreadsheet/Reader/Exception.php');


class Student {
    private $id_indeks;
    private $nr_indeksu;
    private $student;
    private $modul;
    private $przedmiot;
    private $egzaminator;
    private $kod_przedmiotu;
    private $forma_zajec;
    private $sposob_rozliczenia;
    private $semestr;
    private $ocena;
    private $info;
    private $czy_realizowany;

    public function Student($id_indeks, $nr_indeksu, $student, $modul, $przedmiot, $egzaminator, $kod_przedmiotu, $forma_zajec, $sposob_rozliczenia, $semestr, $ocena, $info, $czy_realizowany) {
        $this->id_indeks  = $id_indeks;
        $this->nr_indeksu = $nr_indeksu;
        $this->student    = $student;
        $this->modul      = $modul;
        $this->przedmiot  = $przedmiot;
        $this->egzaminator = $egzaminator;
        $this->kod_przedmiotu = $kod_przedmiotu;
        $this->forma_zajec    = trim($forma_zajec);
        $this->sposob_rozliczenia = trim($sposob_rozliczenia);
        $this->semestr    = $semestr;
        $this->ocena      = $ocena;
        $this->info       = $info;
        $this->czy_realizowany = ($czy_realizowany=='Tak'?true:false);
    }

    public function getIDIndeksu() {
        return $this->id_indeks;
    }
    public function getNrIndeksu() {
        return $this->nr_indeksu;
    }
    public function getStudent() {
        return $this->student;
    }
    public function getModul() {
        return $this->modul;
    }
    public function getPrzedmiot() {
        return $this->przedmiot;
    }
    public function getEgzaminator() {
        return $this->egzaminator;
    }
    public function getKodPrzedmiotu() {
        return $this->kod_przedmiotu;
    }
    public function getFormaZajec() {
        return $this->forma_zajec;
    }
    public function getSposobRozliczenia() {
        return $this->sposob_rozliczenia;
    }
    public function getSemestr() {
        return $this->semestr;
    }
    public function getOcena() {
        return $this->ocena;
    }
    public function getInfo() {
        return $this->info;
    }
    public function getCzyRealizowany() {
        return $this->czy_realizowany;
    }
}

class ImportXLS {
  private $i = 3;
  private $worksheet;

  public function ImportXLS($file) {
    $spreadsheet = IOFactory::load($file);
    $this->worksheet = $spreadsheet->getActiveSheet();
  }

  public function getNextItem() {
      $a = $this->worksheet->getCell('A'.$this->i)->getValue();
      if($a == '') return null;

      $student = new Student($a,
                            $this->worksheet->getCell('B'.$this->i)->getValue(),
                            $this->worksheet->getCell('C'.$this->i)->getValue(),
                            $this->worksheet->getCell('D'.$this->i)->getValue(),
                            $this->worksheet->getCell('E'.$this->i)->getValue(),
                            $this->worksheet->getCell('F'.$this->i)->getValue(),
                            $this->worksheet->getCell('G'.$this->i)->getValue(),
                            $this->worksheet->getCell('H'.$this->i)->getValue(),
                            $this->worksheet->getCell('I'.$this->i)->getValue(),
                            $this->worksheet->getCell('J'.$this->i)->getValue(),
                            $this->worksheet->getCell('K'.$this->i)->getValue(),
                            $this->worksheet->getCell('L'.$this->i)->getValue(),
                            $this->worksheet->getCell('M'.$this->i)->getValue()
                            );

      $this->i++;

      return $student;
  }
}

class ImportDB {
  private $db;
  private $enable_cache = false;
  private $students = [];
  private $modules = [];

  private function loadCache() {
    $res = $this->db->query("SELECT id_student, full_name FROM ahe_students");
    foreach($res as $row) {
      $this->students[$row->id_student] = $row->full_name;
    }

    $res = $this->db->query("SELECT id, module FROM modules");
    foreach($res as $row) {
      $this->modules[$row->id] = $row->module;
    }
  }

  public function ImportDB($host, $user, $pass, $db) {
    $this->db = new mysqli($host, $user, $pass, $db, '3306', null);
    $this->db->set_charset('utf8');

    if($this->enable_cache) {
      $this->loadCache();
    }
  }

  private function checkStudent(Student $student) {
    if($this->enable_cache) {
    } else {
      $res = $this->db->query("SELECT id_student FROM ahe_students WHERE full_name = '".$this->db->real_escape_string($student->getStudent())."' AND index_id = ".$student->getIDIndeksu()." AND index_number = ".$student->getNrIndeksu());
      if($res->num_rows == 0) {
        $this->db->query("INSERT INTO ahe_students (full_name, index_id, index_number) VALUES ('".$this->db->real_escape_string($student->getStudent())."',".$student->getIDIndeksu().",".$student->getNrIndeksu().")");
        return $this->db->insert_id;
      } else {
        $row = $res->fetch_object();
        return $row->id_student;
      }
    }
  }

  private function checkModule($modul) {
    if($this->enable_cache) {
    } else {
      $res = $this->db->query("SELECT id_module FROM ahe_modules WHERE modul_name = '".$this->db->real_escape_string($modul)."'");
      if($res->num_rows == 0) {
        $res = $this->db->query("INSERT INTO ahe_modules (modul_name) VALUES ('".$this->db->real_escape_string($modul)."')");
        return $this->db->insert_id;
      } else {
        $row = $res->fetch_object();
        return $row->id_module;
      }
    }
  }

  private function checkSubject($idModul, Student $student) {
    $subject = $student->getPrzedmiot();
    $code = $student->getKodPrzedmiotu();
    $form = $student->getFormaZajec();
    $settlement = $student->getSposobRozliczenia();

    if($this->enable_cache) {
    } else {
      $res = $this->db->query("SELECT id_subject FROM ahe_subjects WHERE id_module = ".$idModul." AND subject_name = '".$this->db->real_escape_string($subject)."' AND code = '".$code."' AND form = '".$form."' AND settlement = '".$settlement."'");
      if($res->num_rows == 0) {
        $res = $this->db->query("INSERT INTO ahe_subjects (id_module, subject_name, code, form, settlement) VALUES (".$idModul.", '".$this->db->real_escape_string($subject)."', '".$this->db->real_escape_string($code)."', '".$form."', '".$settlement."')");
        return $this->db->insert_id;
      } else {
        $row = $res->fetch_object();
        return $row->id_subject;
      }
    }
  }

  private function checkExaminer($examiner) {
    if($this->enable_cache) {
    } else {
      $res = $this->db->query("SELECT id_examiner FROM ahe_examiners WHERE full_name = '".$this->db->real_escape_string($examiner)."'");
      if($res->num_rows == 0) {
        $res = $this->db->query("INSERT INTO ahe_examiners (full_name) VALUES ('".$this->db->real_escape_string($examiner)."')");
        return $this->db->insert_id;
      } else {
        $row = $res->fetch_object();
        return $row->id_examiner;
      }
    }
  }

  private function checkStudentCard($studentId, $subjectId, $examinerId, Student $student) {
    if($this->enable_cache) {
    } else {
      $sql = "SELECT id_tech FROM ahe_students_cards WHERE id_student = ".$studentId." AND id_subject = ".$subjectId." AND id_examiner = ".$examinerId." AND realization_semestr = ".$student->getSemestr()." AND ";
      if(is_null($student->getOcena())) {
        $sql .= "rating IS NULL";
      } else {
        $sql .= "rating = ".$student->getOcena();
      }
      $sql .= " AND add_info = '".$this->db->real_escape_string($student->getInfo())."' AND progress = ".($student->getCzyRealizowany()?1:0);

      $res = $this->db->query($sql);
      if($res->num_rows == 0) {
        $sql1 = "rating, ";
        $sql2 = $student->getOcena().",";
        if(is_null($student->getOcena())) {
          $sql1 = "";
          $sql2 = "";
        }
        $sql = "INSERT INTO ahe_students_cards (id_student, id_subject, id_examiner, realization_semestr, ".$sql1."add_info, progress) VALUES (".$studentId.", ".$subjectId.", ".$examinerId.", ".$student->getSemestr().", ".$sql2." '".$this->db->real_escape_string($student->getInfo())."', ".($student->getCzyRealizowany()?1:0).")";
        $res = $this->db->query($sql);
        return $this->db->insert_id;
      } else {
        $row = $res->fetch_object();
        return $row->id_tech;
      }
    }
  }

  public function insertStudent(Student $student) {
    $studentId = $this->checkStudent($student);
    $moduleId = $this->checkModule($student->getModul());
    $subjectId = $this->checkSubject($moduleId, $student);
    $examinerId = $this->checkExaminer($student->getEgzaminator());
    $studentCardId = $this->checkStudentCard($studentId, $subjectId, $examinerId, $student);
  }
}

$import = new ImportDB('localhost', 'ahe', 'UFB90lYunSIUXhiK', 'ahe');

$xls = new ImportXLS('D1D.xls');
while(($record = $xls->getNextItem()) != null) {
  $import->insertStudent($record);
}
