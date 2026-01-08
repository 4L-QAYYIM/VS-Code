import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.List;

public class Sanya extends JFrame {

    public Sanya() {
        setTitle("Геометрическое место точек: Парабола");
        setSize(800, 600);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);

        ParabolaPanel panel = new ParabolaPanel();
        add(panel);
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            new Sanya().setVisible(true);
        });
    }
}

class ParabolaPanel extends JPanel implements ActionListener {
    private final int delay = 10; // Задержка в мс
    private double currentX; // Текущая граница отрисовки
    private final List<Point> points = new ArrayList<>();
    
    // Параметры фокуса и директрисы
    private final int focusX = 400;
    private final int focusY = 300;
    private final int directrixX = 600; // Директриса справа от фокуса
    
    public ParabolaPanel() {
        setBackground(Color.BLACK);
        // Начинаем отрисовку справа (от директрисы) и идем налево
        currentX = directrixX;
        Timer timer = new Timer(delay, this);
        timer.start();
    }

    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);
        Graphics2D g2d = (Graphics2D) g;
        g2d.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);

        // Рисуем директрису (вертикальная линия)
        g2d.setColor(Color.RED);
        g2d.drawLine(directrixX, 0, directrixX, getHeight());
        g2d.drawString("Директриса", directrixX - 80, 20);

        // Рисуем фокус (точка)
        g2d.setColor(Color.YELLOW);
        g2d.fillOval(focusX - 4, focusY - 4, 8, 8);
        g2d.drawString("Фокус (F)", focusX + 10, focusY - 10);

        // Рисуем найденные точки параболы
        g2d.setColor(Color.CYAN);
        for (Point p : points) {
            g2d.fillOval(p.x, p.y, 3, 3);
        }
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        // Движение справа налево
        if (currentX > 0) {
            // Расстояние p от фокуса до директрисы
            double p = directrixX - focusX;
            
            // Вычисляем y для текущего x на основе определения параболы
            // (x - focusX)^2 + (y - focusY)^2 = (x - directrixX)^2
            // После упрощения: (y - focusY)^2 = 2 * p * (directrixX + focusX - 2x) / 2 ...
            // Проще считать через теорему Пифагора напрямую:
            for (int y = 0; y < getHeight(); y++) {
                double distToFocus = Math.sqrt(Math.pow(currentX - focusX, 2) + Math.pow(y - focusY, 2));
                double distToDirectrix = Math.abs(currentX - directrixX);
                
                // Если расстояния примерно равны (с небольшой погрешностью)
                if (Math.abs(distToFocus - distToDirectrix) < 1.0) {
                    points.add(new Point((int)currentX, y));
                }
            }
            currentX -= 1; // Шаг влево
            repaint();
        }
    }
}