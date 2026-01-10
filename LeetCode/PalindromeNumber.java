import java.util.Scanner;

class PalindromeNumber{
    // Given an integer x, return true if x is a palindrome, and false otherwise.
    public static void main(String[] args){
        Scanner in = new Scanner(System.in);
        int x = in.nextInt();
        System.out.print(isPalindrome(x));
    }
    static boolean isPalindrome(int x){
        if((x < 0) || (String.valueOf(x).charAt(0 ) != String.valueOf(x).charAt(String.valueOf(x).length() - 1))) return false;
        String num = "";
        for(int i = String.valueOf(x).length() - 1; i >= 0; i--){
            num += (String.valueOf(x).charAt(i));
        }
        if(Integer.valueOf(num) == x){
            return true;
        }
        else{
            return false;
        }
    }
}