package backendUtils;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class SingleImplementation {
    private String studentId;
    private String eventId;

    //takes filePath of QR Code File and then uses it for implementation to database
    public void ScanAndGiveOutput(String filePath){
        step1_ReadQR(filePath);
        step2_WorkaOnDataFromQR();;
    }
    // reads data from qr code
    private void step1_ReadQR(String filePath){
        String[] res=new MyQrScanner().readQR(filePath);
        studentId=res[0];
        eventId=res[1];
        System.out.println("student id : "+studentId+" and event id : "+eventId+" has been read from QR Code");
    }
    //implements on data from qr code
    private void step2_WorkaOnDataFromQR(){
        System.out.println("Connecting to database ...");
        Connection connection=ConnectionManager.getInstance().getConnection();
        if(isStudentIdAndEventIdPresentInDatabase(connection)){
            markPresent(connection);
        }
        else{
            System.out.println("student id :"+studentId+" and event Id : "+eventId+" not found in the database together");
        }
        System.out.println("closing connection to database ...");
        ConnectionManager.getInstance().closeConnection();
    }

    // helper function to check if studentid and event id is present in database or not
    private boolean isStudentIdAndEventIdPresentInDatabase(Connection con) {
        try {
            // Check if the entry exists in the database
            PreparedStatement statement = con.prepareStatement("SELECT * FROM eligibles WHERE student_id = ? AND event_id = ?");
            statement.setString(1, studentId);
            statement.setString(2, eventId);
            ResultSet resultSet = statement.executeQuery();

            return resultSet.next();

        } catch (SQLException e) {
            e.printStackTrace();
        }

        // Return false if any exception occurs or no entry found
        return false;
    }
    // helper function to mark student as present
    private void markPresent(Connection con){
        try{
            PreparedStatement checkStatement = con.prepareStatement("SELECT present FROM eligibles WHERE student_id = ? AND event_id = ?");
            checkStatement.setString(1,studentId);
            checkStatement.setString(2,eventId);
            ResultSet resultSet=checkStatement.executeQuery();
            if(resultSet.next()){
                int presentValue = resultSet.getInt("present");
                if (presentValue == 1) {
                    System.out.println("Student with id "+studentId+" Already marked present");
                    return;
                }
            }
            PreparedStatement updateStatement = con.prepareStatement("UPDATE eligibles SET present = 1 WHERE student_id = ? AND event_id = ?");
            updateStatement.setString(1, studentId);
            updateStatement.setString(2, eventId);
            updateStatement.executeUpdate();

            System.out.println("Student id : " + studentId + " marked present");

        }catch (SQLException e){
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        String filePath="D:\\Laravell project under ashish sir\\my local repo\\project_laravel\\Android app 2 for Scanning QR\\Java2ForLocalSource\\src\\main\\java\\org\\example\\backendUtils\\qrs for testing\\qr1.jpg";
        backendUtils.SingleImplementation obj=new backendUtils.SingleImplementation();
        obj.ScanAndGiveOutput(filePath);
    }
//    before adding 1001 as student id and 2300 as event id inside mysql database

//    student id : 1001 and event id : 2300 has been read from QR Code
//    Connecting to database ...
//    student id :1001 and event Id : 2300 not found in the database together
//    closing connection to database ...
//****************************************************************************************************************************
//    after adding 1001 as student id and 2300 as event id in mysql database with 0 as present value
//    student id : 1001 and event id : 2300 has been read from QR Code
//    Connecting to database ...
//    Student id : 1001 marked present
//    closing connection to database ...
//    **************************************************************************************************************************
//    after marking 1001 student id and 2300 event id as present
//    student id : 1001 and event id : 2300 has been read from QR Code
//    Connecting to database ...
//    Student with id 1001 Already marked present
//    closing connection to database ...
}
