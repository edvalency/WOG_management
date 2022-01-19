<?php 
class DB{
    private $con;
    private $host = 'localhost';
    private $dbname = 'wog_management';
    private $username = 'user';
    private $password = 'ghost';

    public function __construct(){
        $dbcon ="mysql:host=".$this->host.";dbname=".$this->dbname;
        try{
            $this->con = new PDO($dbcon, $this->username,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
    }

    
    public function insert($fullname,$dob,$phone,$gender,$hometown,$region,$residence,$email,$fname,$fstat,
    $mothersname,$motherstat,$nok,$nok_phone,$relation,$email_nok,$dept,$baptism_stat,$date_baptised,$yom,$profession,$occupation,$company_name,$em_stat){
        $query= "INSERT INTO `members` (`fullname`, `dob`, `contact`, `gender`, `hometown`, `region`, `residence`, `email`, `fathersname`, `fatherstat`, `mothersname`, `motherstat`, `next_of_kin`, `next_of_kin_contact`, `relation_to_nok`, `email_of_nok`, `dept`, `baptism_stat`, `date_baptised`, `yom`, `profession`, `present_occupation`, `name_of_company`, `employment_stat`) 
        VALUES ('$fullname', '$dob', '$phone', '$gender', '$hometown', '$region', '$residence', '$email', '$fname', '$fstat', '$mothersname', '$motherstat', '$nok', '$nok_phone', '$relation', '$email_nok', '$dept', '$baptism_stat', '$date_baptised', '$yom', '$profession', '$occupation', '$company_name', '$em_stat')";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
    }

    // public function insert($fullname,$dob,$phone,$gender,$hometown,$region,$residence,$email,$fname,$fstat,$mname,$mstat,$nok,$nok_phone,$relation,$nok_email,$baptism_stat,$date_baptised,$yom,$profession,$occupation,$company_name,$em_stat){
    //     $query = "INSERT INTO members(fullname,dob,contact,gender,hometown,region,residence,email,fathersname,fatherstat,mothersname,
    //     motherstat,next_of_kin,next_of_kin_contact,relation_to_nok,email_of_nok,dept,baptism_stat,date_baptised, `yom`, `profession`, `present_occupation`,
    //      `name_of_company`, `employment_stat`) VALUES ('$fullname','$dob','$phone','$gender','$hometown','$region','$residence','$email','$fname','$fstat','$mname','$mstat','$nok','$nok_phone','$relation','$nok_email','$baptism_stat','$date_baptised','$yom','$profession','$occupation','$company_name','$em_stat')";
    //     $cmd = $this->con->prepare($query);
    //     $cmd->execute();
       
    // }
    
    public function ins(){
        $query= "INSERT INTO `members` (`fullname`, `dob`, `contact`, `gender`, `hometown`, `region`, `residence`, `email`, `fathersname`, `fatherstat`, `mothersname`, `motherstat`, `next_of_kin`, `next_of_kin_contact`, `relation_to_nok`, `email_of_nok`, `dept`, `baptism_stat`, `date_baptised`, `yom`, `profession`, `present_occupation`, `name_of_company`, `employment_stat`) 
        VALUES ('Matthew Casey', '2021-09-08', '0244291433', 'Male', 'Akyem Swedru', 'Savannah', 'Santa Maria', 'edwinofosuhene31@gmail.com', 'Evans Abrokwah', 'dead', 'Grace Daniels', 'alive', 'Morgan Alex', '0244291433', 'nephew', 'morgan@gmail.com', 'Tachmonite', 'yes', '2021-09-08', '2021', 'Janitor', 'cleaner', 'self', 'student')";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
    }

    public function update(){
        $query = "UPDATE members set fathersname='Evans Abrokwah' WHERE fullname='[value-1]'";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
    }

    public function viewAll(){
        $query = "SELECT * FROM members";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function viewGCRecords(){
        $query = "SELECT * FROM members WHERE dept='Game Changers Generation'";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function viewOne($fullname){
        $query = "SELECT * FROM members WHERE fullname = '$fullname'";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function addoffertory($amount){
        $today = date('d/m/Y');
        $query = "INSERT INTO offertory (date, amount) VALUES ('$today',$amount)";
        $cmd = $this->con->prepare($query);
        $cmd->execute();

    }
    public function viewOffertory(){
        $query = "SELECT * FROM offertory";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function viewExpenses(){
        $query = "SELECT * FROM expenses";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function viewMembers(){
        $query = "SELECT fullname FROM members";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function viewRecords($member){
        $query = "SELECT date,amount FROM tithes WHERE name = '$member'";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function viewGCmdues($member){
        $query = "SELECT date,amount FROM gc_dues WHERE name = '$member'";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertrecord($name,$amount){
        $date = date('d/m/Y');
        $query = "INSERT INTO tithes (date, name, amount) VALUES ('$date','$name','$amount')";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        
    }

    public function insertexpenses($desc,$amount){
        $date = date('d/m/Y');
        $query = "INSERT INTO expenses (date, description, amount) VALUES ('$date','$desc','$amount')";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        
    }

    // public function insertGCrecord($name,$amount){
    //     $date = date('d/m/Y');
    //     $query = "INSERT INTO gc_dues (name, date, amount) VALUES ('$name','$date','$amount')";
    //     $cmd = $this->con->prepare($query);
    //     $cmd->execute();
        
    // }

    public function totalMonth(){
        $query = "SELECT date, amount FROM tithes";
        $cmd = $this->con->prepare($query);
        $cmd -> execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function searchData($member){
        $query = "SELECT fullname FROM members WHERE fullname LIKE :name";
        $cmd = $this->con->prepare($query);
        $cmd->execute(["name" => '%' . $member . "%"]);
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function viewMemberRecords($member){
        $query = "SELECT month, year, amount FROM welfare WHERE name = '$member'";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertWelfare($month,$name, $amount){
        $date = date('Y');
        $query = "INSERT INTO welfare (month, year, name, amount) VALUES ('$month','$date','$name','$amount')";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        
    }

    public function insertGCdues($date,$name,$amount,){
        $conv = explode("-",$date);
        $ndate = date($conv[2]."/".$conv[1]."/".$conv[0]);
        $query = "INSERT INTO gc_dues (date, name, amount) VALUES ('$ndate','$name','$amount')";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
    }

    public function viewTotalMembers(){
        $query = "SELECT * FROM members";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->rowCount();
        return $data;
    }

    public function offertorysum(){
        $totaloffertory = 0;
        $query = "SELECT amount FROM offertory";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $amnt){
            $totaloffertory += $amnt['amount'];
        }
        return $totaloffertory;
    }

    public function totalTithe(){
        $totaltithe = 0;
        $query = "SELECT amount FROM tithes";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $tithe){
            $totaltithe += $tithe['amount'];
        }
        return $totaltithe;
    }

    public function totalwelfare(){
        $totalwelfare = 0;
        $query = "SELECT amount FROM welfare";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $tithe){
            $totaltithe += $tithe['amount'];
        }
        return $totaltithe;
    }

    public function totalbal(){
        $totaltithe = 0;
        $totaloffertory = 0;
        $totalbal = 0;

        $query = "SELECT amount FROM offertory";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $amnt){
            $totaloffertory += $amnt['amount'];
        }

        $query = "SELECT amount FROM tithes";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $tithe){
            $totaltithe += $tithe['amount'];
        }

        $totalbal = $totaltithe + $totaloffertory;
        return $totalbal;
    }

}

?> 