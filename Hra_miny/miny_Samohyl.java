package miny;

import java.util.Random;
import java.util.Scanner;


public class Miny {

    
    public static void main(String[] args) {
        Random rand = new Random();
        Scanner myObj = new Scanner(System.in);  
        int x_max = 10;
        int y_max = 10;
        int x, y;
        int[][] array = new int[x_max][y_max];
        int[][] array_show = new int[x_max][y_max];
        int input_x = -1, input_y = -1, game_over = 0;

        //reset
        y = 0;
        System.out.println(y);
        while (y_max > y) {
            x = 0;
            while (x_max > x) {
                array[x][y] = 0;
                array_show[x][y] = 0;
                x++;
            }
            System.out.println();
            y++;
        }

        //bomby
        int i = 0;
        int n = rand.nextInt(10) + 10;
        while (i < n) {
            x = rand.nextInt(x_max);
            y = rand.nextInt(y_max);
            array[x][y] = 9;
            i++;
        }

        //cisla
        y = 0;
        while (y_max > y) {
            x = 0;
            while (x_max > x) {
                //bomba
                if (array[x][y] == 9) {
                    //první patro
                    if (x - 1 >= 0 && y - 1 >= 0 && array[x - 1][y - 1] != 9) {
                        array[x - 1][y - 1] += 1;
                    }
                    if (y - 1 >= 0 && array[x][y - 1] != 9) {
                        array[x][y - 1] += 1;
                    }
                    if (x + 1 < x_max && y - 1 >= 0 && array[x + 1][y - 1] != 9) {
                        array[x + 1][y - 1] += 1;
                    }

                    //střed
                    if (x - 1 >= 0 && array[x - 1][y] != 9) {
                        array[x - 1][y] += 1;
                    }
                    if (x + 1 < x_max && array[x + 1][y] != 9) {
                        array[x + 1][y] += 1;
                    }

                    //dolní patro
                    if (x - 1 >= 0 && y + 1 < y_max && array[x - 1][y + 1] != 9) {
                        array[x - 1][y + 1] += 1;
                    }
                    if (y + 1 < y_max && array[x][y + 1] != 9) {
                        array[x][y + 1] += 1;
                    }
                    if (x + 1 < x_max && y + 1 < y_max && array[x + 1][y + 1] != 9) {
                        array[x + 1][y + 1] += 1;
                    }
                }
                x++;
            }
            y++;
        }

        while (true) {
            //odkrývání
            if (input_x >= 0 && input_x < x_max && input_y >= 0 && input_y < y_max) {
                array_show[input_x][input_y] = 1;
                //konec
                if (array[input_x][input_y] == 9) {
                    game_over = 1;
                    break;
                }
                //není už žádné pole
                if (false) {
                    game_over = 2;
                    break;
                }
                //otevře okolo
                if (array[input_x][input_y] == 1) {

                }
            }
            //vypis
            System.out.print("   ");
            i = 0;
            while (x_max > i) {
                System.out.print(" " + i + "  ");
                i++;
            }
            System.out.println();
            System.out.print("   ");
            i = 0;
            while (x_max > i) {
                System.out.print("____");
                i++;
            }
            System.out.println();
            y = 0;
            while (y_max > y) {
                x = 0;
                System.out.print(y + " | ");
                while (x_max > x) {
                    if (array_show[x][y] == 1) {
                        if (array[x][y] == 9) {
                            System.out.print("x | ");
                        } else {
                            System.out.print(array[x][y] + " | ");
                        }
                    } else {
                        System.out.print("  | ");
                    }
                    x++;
                }
                System.out.println();
                y++;
            }
            System.out.print("   ");
            i = 0;
            while (x_max > i) {
                System.out.print("----");
                i++;
            }
            System.out.println("\nZadej souřadnice");
            System.out.print("x: ");
            input_x = myObj.nextInt();  // Read user input
            System.out.print("y: ");
            input_y = myObj.nextInt();  // Read user input
            System.out.println("\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n");
        }

        //konec game over
        if (game_over == 1) {
            System.out.println("Nevyšlo to, zkus to znovu");
        }

        //konec vyhra
        if (game_over == 2) {
            System.out.println("Dokázal jsi to!");
        }
    }

    public static void recur(int x, int y) {

    }
}