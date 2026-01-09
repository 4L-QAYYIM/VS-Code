package Coursework;

import java.util.ArrayList;

public class TodoModel {
    private ArrayList<Task> List;

    public void addTask(Task task){
        List.add(task);
    }
    public void deleteTask(int index){
        List.remove(index);
    }
    public ArrayList<Task> getTasks(){
        return List;
    }
    public Task getTask(int index){
        return List.get(index);
    }
}
