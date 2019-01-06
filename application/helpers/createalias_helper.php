<?php
	function stripUnicode($str){
		if(!$str) return false;
        $unicode = array(
  			'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
            'd'=>array('đ'),
            'D'=>array('Đ'),
            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
            'i'=>array('í','ì','ỉ','ĩ','ị'),
            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
            '-'=>array(' ')
        );

        foreach($unicode as $nonUnicode=>$uni){
        	foreach($uni as $value)
        	$str = str_replace($value,$nonUnicode,$str);
        }
		return $str;
	}

	function changeTitle($str) {
		$str = trim($str);
		if($str == "") return "";
		$str = str_replace('""', '', $str);
		$str = str_replace("'", '', $str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str, MB_CASE_LOWER,'utf-8');
		$str = str_replace(' ', '-', $str);
		return $str;
	}


	function convertNumber($number)
	{
		list($integer, $fraction) = explode(".", (string) $number);

	    $output = "";

	    if ($integer{0} == "-")
	    {
	        $output = "negative ";
	        $integer    = ltrim($integer, "-");
	    }
	    else if ($integer{0} == "+")
	    {
	        $output = "positive ";
	        $integer    = ltrim($integer, "+");
	    }

	    if ($integer{0} == "0")
	    {
	        $output .= "zero";
	    }
	    else
	    {
	        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
	        $group   = rtrim(chunk_split($integer, 3, " "), " ");
	        $groups  = explode(" ", $group);

	        $groups2 = array();
	        foreach ($groups as $g)
	        {
	            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
	        }

	        for ($z = 0; $z < count($groups2); $z++)
	        {
	            if ($groups2[$z] != "")
	            {
	                $output .= $groups2[$z] . convertGroup(11 - $z) . (
	                        $z < 11
	                        && !array_search('', array_slice($groups2, $z + 1, -1))
	                        && $groups2[11] != ''
	                        && $groups[11]{0} == '0'
	                            ? " and "
	                            : ", "
	                    );
	            }
	        }

	        $output = rtrim($output, ", ");
	    }

	    if ($fraction > 0)
	    {
	        $output .= " point";
	        for ($i = 0; $i < strlen($fraction); $i++)
	        {
	            $output .= " " . convertDigit($fraction{$i});
	        }
	    }

	    return $output;
	}

	function convertGroup($index)
	{
	    switch ($index)
	    {
	        case 11:
	            return " decillion";
	        case 10:
	            return " nonillion";
	        case 9:
	            return " octillion";
	        case 8:
	            return " septillion";
	        case 7:
	            return " sextillion";
	        case 6:
	            return " quintrillion";
	        case 5:
	            return " quadrillion";
	        case 4:
	            return " trillion";
	        case 3:
	            return " billion";
	        case 2:
	            return " million";
	        case 1:
	            return " thousand";
	        case 0:
	            return "";
	    }
	}

	function convertThreeDigit($digit1, $digit2, $digit3)
	{
	    $buffer = "";

	    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
	    {
	        return "";
	    }

	    if ($digit1 != "0")
	    {
	        $buffer .= convertDigit($digit1) . " hundred";
	        if ($digit2 != "0" || $digit3 != "0")
	        {
	            $buffer .= " and ";
	        }
	    }

	    if ($digit2 != "0")
	    {
	        $buffer .= convertTwoDigit($digit2, $digit3);
	    }
	    else if ($digit3 != "0")
	    {
	        $buffer .= convertDigit($digit3);
	    }

	    return $buffer;
	}

	function convertTwoDigit($digit1, $digit2)
	{
	    if ($digit2 == "0")
	    {
	        switch ($digit1)
	        {
	            case "1":
	                return "ten";
	            case "2":
	                return "twenty";
	            case "3":
	                return "thirty";
	            case "4":
	                return "forty";
	            case "5":
	                return "fifty";
	            case "6":
	                return "sixty";
	            case "7":
	                return "seventy";
	            case "8":
	                return "eighty";
	            case "9":
	                return "ninety";
	        }
	    } else if ($digit1 == "1")
	    {
	        switch ($digit2)
	        {
	            case "1":
	                return "eleven";
	            case "2":
	                return "twelve";
	            case "3":
	                return "thirteen";
	            case "4":
	                return "fourteen";
	            case "5":
	                return "fifteen";
	            case "6":
	                return "sixteen";
	            case "7":
	                return "seventeen";
	            case "8":
	                return "eighteen";
	            case "9":
	                return "nineteen";
	        }
	    } else
	    {
	        $temp = convertDigit($digit2);
	        switch ($digit1)
	        {
	            case "2":
	                return "twenty-$temp";
	            case "3":
	                return "thirty-$temp";
	            case "4":
	                return "forty-$temp";
	            case "5":
	                return "fifty-$temp";
	            case "6":
	                return "sixty-$temp";
	            case "7":
	                return "seventy-$temp";
	            case "8":
	                return "eighty-$temp";
	            case "9":
	                return "ninety-$temp";
	        }
	    }
	}

	function convertDigit($digit)
	{
	    switch ($digit)
	    {
	        case "0":
	            return "zero";
	        case "1":
	            return "one";
	        case "2":
	            return "two";
	        case "3":
	            return "three";
	        case "4":
	            return "four";
	        case "5":
	            return "five";
	        case "6":
	            return "six";
	        case "7":
	            return "seven";
	        case "8":
	            return "eight";
	        case "9":
	            return "nine";
	    }
	}
?>