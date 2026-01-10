import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;

class RomanNumerals{
    // Given a roman numeral, convert it to an integer.

    public static void main(String[] args){
        Scanner in = new Scanner(System.in);
        String s = "";
        while(s != "0"){
            s = in.next();
            System.out.println(romanToInt(s));
        }
    }
    static int romanToInt(String s) {
        Map<Character, Integer> romanNumbers = Map.of(
            'I', 1,
            'V', 5,
            'X', 10,
            'L', 50,
            'C', 100,
            'D', 500,
            'M', 1000
        );

        int intNumber = 0;

        int i = 0; 
        while(i < s.length() - 1){
            if(romanNumbers.getOrDefault(s.charAt(i), 0) >= romanNumbers.getOrDefault(s.charAt(i + 1), 0)){
                intNumber += romanNumbers.getOrDefault(s.charAt(i), 0);
            }
            else{
                intNumber += romanNumbers.getOrDefault(s.charAt(i + 1), 0) - romanNumbers.getOrDefault(s.charAt(i), 0);
                i++;
            }
            i++;
        }
        if(i == s.length() - 1){
            intNumber += romanNumbers.getOrDefault(s.charAt(i), 0);
        }
        System.out.println("Num = " + intNumber + " i = " + i);

        return intNumber;
    }
}