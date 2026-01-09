package Coursework.TodoList;

public class Main {
    public static void main(String[] args){
        TodoModel model = new TodoModel();
        View view = new View();

        Controller controller = new Controller(model, view);
    }
}