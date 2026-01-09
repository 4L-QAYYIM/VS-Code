package Coursework.TodoList;

public class Task {
    // name - name of task
    // status - status of task
    private String name;
    private boolean status;

    // Setter for changing name
    public void setName(String name){
        this.name = name;
    }
    // Getter for getting name
    public String getName(){
        return name;
    }

    // Setter for changing status
    public void setStatus(boolean status){
        this.status = status;
    }
    // Getter for getting status
    public boolean getStatus(){
        return status;
    }
}

