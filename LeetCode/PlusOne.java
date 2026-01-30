public class PlusOne {
    public int[] plusOne(int[] digits) {
        int i = digits.length - 1;
        digits[i] += 1;
        while(digits[i] == 10 && i > 0){
            digits[i] = 0;
            i--;
            digits[i] += 1;
        }
        if(digits[0] == 10){
            int[] newDigits = new int[digits.length + 1];
            newDigits[0] = 1;
            for(int j = 1; j < newDigits.length; j++){
                newDigits[j] = 0;
            }
            return newDigits;
        }
        return digits;
    }

    public static void main(String[] args) {
        PlusOne po = new PlusOne();
        int[] digits = {9};
        int[] result = po.plusOne(digits);
        System.out.print("Result after plus one: ");
        for(int digit : result){
            System.out.print(digit);
        }
    }
}
