package Coursework.Library;

public class Book {
    private String bookName;
    private String author;
    private int yearOfPublication;
    private boolean isAvailable;

    public void setBookName(String bookName){
        this.bookName = bookName;
    }
    public void setAuthor(String author){
        this.author = author;
    }
    public void setYearOfPublication(int yearOfPublication){
        this.yearOfPublication = yearOfPublication;
    }
    public void setIsAvailable(boolean isAvailable){
        this.isAvailable = isAvailable;
    }

    public String getBookName(){
        return bookName;
    }
    public String getAuthor(){
        return author;
    }
    public int getYearOfPublication(){
        return yearOfPublication;
    }
    public boolean getIsAvailable(){
        return isAvailable;
    }
}
