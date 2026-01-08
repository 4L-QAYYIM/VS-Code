package Java;

import java.util.Random;
import java.util.Scanner;

public class L1P1E2 {
    public static void main(String[] args){
        //Дан массив чисел. Указать те его элементы, которые принадлежат отрезку [с, d].

        Random random = new Random();
        Scanner in = new Scanner(System.in);

        int[] mass = new int[random.nextInt(10) + 5];

        for(int i = 0; i < mass.length; i++){
            mass[i] = random.nextInt(50);
            System.out.print(mass[i] + " ");
        }
        System.out.println();

        System.out.print("Enter the starting and ending indices: ");
        int begin, end;
        while(true){
            begin = in.nextInt();
            end = in.nextInt();
            if(((begin >= 0) && (begin < mass.length)) && ((end >= 0) && (end < mass.length))) break;
            else System.out.print("Try again: ");
        }
        System.out.print("Your indicies: " + begin + " and " + end);
        if(begin > end) {
            int tmp = begin;
            begin = end;
            end = tmp;
        }
        System.out.println();

        System.out.print("Massive from begin to end: ");
        for(int i = begin; i <= end; i++){
            System.out.print(mass[i] + " ");
        }
    }
}
