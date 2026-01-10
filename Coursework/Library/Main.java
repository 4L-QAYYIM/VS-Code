package Coursework.Library;

public class Main {
    public static void main(String[] args){
        LibraryModel model = new LibraryModel();
        View view = new View();

        Controller controller = new Controller(model, view);
    }
}
