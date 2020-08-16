using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;
public partial class images : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite13\App_Data\student1.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();

    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
            Response.Write("connection");
        }
        display();
    }
    public void display()
    {
        SqlDataAdapter adp = new SqlDataAdapter("StoredProcedure8", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string f_name = FileUpload1.FileName;

        FileUpload1.SaveAs(Server.MapPath("./image/" + f_name));
        
        Image1.ImageUrl = "./image/" + f_name;
     
        SqlCommand cmd = new SqlCommand("StoredProcedure7", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.Parameters.AddWithValue("@var2", Image1.ImageUrl);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        display();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        String f_name=FileUpload1.FileName;

        FileUpload1.SaveAs(Server.MapPath("./image/" + f_name));

        Image1.ImageUrl = "./image/" + f_name;
        SqlCommand cmd = new SqlCommand("StoredProcedure9", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.Parameters.AddWithValue("@var2", Image1.ImageUrl);
        cmd.Parameters.AddWithValue("@var3", TextBox2.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("update record");
        display();
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure10", con);
        cmd.Parameters.AddWithValue("@var1", TextBox2.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("delete record");
        display();
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure11", con);
        cmd.Parameters.AddWithValue("@var1", TextBox2.Text);
        cmd.CommandType = CommandType.StoredProcedure;

        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
        Response.Write("search record");
    }
}