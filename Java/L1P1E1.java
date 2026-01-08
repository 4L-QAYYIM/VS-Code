package Java;

import java.util.Random;

public class L1P1E1 {
    public static void main(String[] args){
        //Сформировать одномерный массив случайным образом. 
        //Определить количество четных элементов массива, стоящих на четных местах.
        
        Random random = new Random();

        int[] mass = new int[random.nextInt(10) + 5];
        int count = 0;

        System.out.print("Massive: ");
        for(int i = 0; i < mass.length; i++){
            mass[i] = random.nextInt(50);
            System.out.print(mass[i] + " ");
            if((mass[i] % 2 == 0) && (i % 2 == 0)) count++;
        }

        System.out.println();
        System.out.println("Count: " + count);
    }
}