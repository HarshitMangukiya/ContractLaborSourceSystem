using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;

public partial class view_storepocedure : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite10\App_Data\student.mdf;Integrated Security=True;User Instance=True");
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
        SqlDataAdapter adp = new SqlDataAdapter("StoredProcedure2", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string genderx = null;
        if (RadioButton1.Checked == true)
        {
            genderx = "male";
        }

        if (RadioButton2.Checked == true)
        {
            genderx = "female";
        }

        string hobbyx = null;
        if (CheckBox1.Checked == true)
        {
            hobbyx = "dancing,";
        }
        if (CheckBox2.Checked == true)
        {
            hobbyx = "reading,";
        } 
        if (CheckBox3.Checked == true)
        {
            hobbyx = "music,";
        }

        string streamx = null;
        if (RadioButton4.Checked == true)
        {
            streamx = "science";
        }
        if (RadioButton3.Checked == true)
        {
            streamx = "commerce";
        }
        SqlCommand cmd = new SqlCommand("StoredProcedure1", con);
        cmd.Parameters.AddWithValue("@var1", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var2", genderx);
        cmd.Parameters.AddWithValue("@var3", DropDownList1.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var4", hobbyx);
        cmd.Parameters.AddWithValue("@var5", DropDownList2.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var6", streamx);
        cmd.Parameters.AddWithValue("@var7", TextBox3.Text);

        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();

        Response.Write("insert record");
        display();
    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        string genderx = null;
        if (RadioButton1.Checked == true)
        {
            genderx = "male";
        }

        if (RadioButton2.Checked == true)
        {
            genderx = "female";
        }

        string hobbyx = null;
        if (CheckBox1.Checked == true)
        {
            hobbyx = "dancing,";
        }
        if (CheckBox2.Checked == true)
        {
            hobbyx = "reading,";
        }
        if (CheckBox3.Checked == true)
        {
            hobbyx = "music,";
        }

        string streamx = null;
        if (RadioButton4.Checked == true)
        {
            streamx = "science";
        }
        if (RadioButton3.Checked == true)
        {
            streamx = "commerce";
        }

        SqlCommand cmd = new SqlCommand("StoredProcedure3", con);
        cmd.Parameters.AddWithValue("@var1", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var2", genderx);
        cmd.Parameters.AddWithValue("@var3", DropDownList1.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var4", hobbyx);
        cmd.Parameters.AddWithValue("@var5", DropDownList2.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var6", streamx);
        cmd.Parameters.AddWithValue("@var7", TextBox3.Text);
        cmd.Parameters.AddWithValue("@var8", TextBox1.Text);

        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("update record");
        
        display();

    }

    protected void Button6_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure4", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("delete record");
        display();
        Response.Redirect("display_emp.aspx");
    }

    protected void Button7_Click(object sender, EventArgs e)
    {
        Response.Redirect("display_emp.aspx");
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        TextBox1.Text = GridView1.SelectedRow.Cells[1].Text;
        TextBox2.Text = GridView1.SelectedRow.Cells[2].Text;
        string genderx = GridView1.SelectedRow.Cells[3].Text;
        if (genderx == "male")
        {
            RadioButton1.Checked = true;
            RadioButton2.Checked = false;
        }
        if (genderx == "female")
        {
            RadioButton2.Checked = true;
            RadioButton1.Checked = false;
        }
        string streamx = GridView1.SelectedRow.Cells[7].Text;
        if (streamx == "science")
        {
            RadioButton3.Checked = true;
            RadioButton4.Checked = false;
        }
        if (streamx == "commerce")
        {
            RadioButton4.Checked = true;
            RadioButton3.Checked = false;
        }
        TextBox3.Text = GridView1.SelectedRow.Cells[8].Text;
    }
    protected void Button4_Click(object sender, EventArgs e)
    {

    }
    protected void Button7_Click1(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure5", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.CommandType=CommandType.StoredProcedure;
       
        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds=new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
    }
}