package Coursework.TodoList;

import java.util.ArrayList;

public class TodoModel {
    // List - to store tasks
    private ArrayList<Task> List = new ArrayList<>();

    // Setter which adds the task
    public void addTask(Task task){
        List.add(task);
    }
    // Method which deletes all tasks
    public void deleteAll(){
        List.clear();
    }
    // Getter for getting all tasks
    public ArrayList<Task> getTasks(){
        return List;
    }
    // Getter for getting a task that is located at the specified index 
    public Task getTask(int index){
        return List.get(index);
    }
}
